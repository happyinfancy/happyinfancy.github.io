</div>
<!-- /.container -->
<!--<footer style="position: fixed; bottom: 0;text-align: center">
    <div class="small-print">
        <div class="container">
            <p>Copyright &copy; happyinfancy.com 2022 </p>
        </div>
    </div>
</footer>-->
<script type="module">
    // Import the functions you need from the SDKs you need
    import {initializeApp} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
    import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";


    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyAzqTlIP2v-wyeWuhwg9xw7sUdHdJgt17w",
        authDomain: "happyinfancy2.firebaseapp.com",
        projectId: "happyinfancy2",
        storageBucket: "happyinfancy2.appspot.com",
        messagingSenderId: "645727238430",
        appId: "1:645727238430:web:477e97f38f19e68a6e710f",
        measurementId: "G-1PPSVYY4VE"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);

    import {
        getFirestore,
        doc,
        setDoc,
        addDoc,
        collection,
        getDocs,
        getDoc,
        updateDoc,
        deleteDoc,
        query,
        where
    } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js";

    const db = getFirestore();

    /**********************STATION FUNCTIONS**************************/
    async function station_save(data) {
        block_button();
        try {
            const docRef = await addDoc(collection(db, "station"), {
                station_name: data.station_name,
                station_address: data.station_address
            });
            success_notify('Station created successfully');
            console.log("Document written with ID: ", docRef.id);
        } catch (e) {
            console.error('Error adding station', e);
        }
        unblock_button();
    }

    async function stations_list() {
        const querySnapshot = await getDocs(collection(db, "station"));
        querySnapshot.forEach((doc) => {
            var station_row = `<tr id="${doc.id}">
                                    <td>${doc.data().station_name}</td>
                                    <td>${doc.data().station_address}</td>
                                    <td>
                                        <a href="station_edit.php?station_id=${doc.id}" class="btn btn-info">Edit</a>
                                         <span class="btn btn-danger delete-btn" data-station-id="${doc.id}">Delete</span>
                                    </td>
                                  </tr>`;
            $('#stations-list').append(station_row);
        });
        $('#stations-list-table').DataTable();
    }

    async function station_get_by_id(station_id) {
        const docRef = doc(db, "station", station_id);
        const docSnap = await getDoc(docRef);

        if (docSnap.exists()) {
            $('#station_name').val(docSnap.data().station_name);
            $('#station_address').val(docSnap.data().station_address);
            $('#station_id').val(docSnap.id);
        } else {
            error_notify('No such station exists');
        }
    }

    async function station_update(data) {
        block_button();
        try {
            const docRef = doc(db, 'station', data.station_id);
            await updateDoc(docRef, {
                station_name: data.station_name,
                station_address: data.station_address
            });
            success_notify('Station updated successfully');
        } catch (e) {
            error_notify('Error updating station');
        }

        unblock_button()
    }

    $('.station-save-btn').click(function () {
        if (is_empty($('#station_name').val())) {
            Lobibox.notify('error', {
                size: 'mini',
                sound: false,
                msg: 'Station name is required'
            });
            return false;
        }
        var data = {
            station_name: $('#station_name').val(),
            station_address: $('#station_address').val(),
        };
        station_save(data)
    });

    $('.station-update-btn').click(function () {
        if (is_empty($('#station_name').val())) {
            error_notify('Station name is required');
            return false;
        }
        var data = {
            station_name: $('#station_name').val(),
            station_address: $('#station_address').val(),
            station_id: $('#station_id').val()
        };
        station_update(data)
    });

    async function delete_station_by_id(station_id) {
        await deleteDoc(doc(db, 'station', station_id));
        $(`#${station_id}`).remove();
        success_notify('Station deleted successfully');
    }

    $(document).on('click', '.delete-btn', function () {
        var station_id = $(this).attr('data-station-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                delete_station_by_id(station_id);
            }
        })
    });

    /**********************END- STATION FUNCTIONS**************************/

    /**********************JOURNEY FUNCTIONS**************************/

    async function journeys_list() {
        block_button();
        $('#journeys-list').html('');
        // $('#journeys-list-table').DataTable().clear();


        const departure_station = $('#departure_station').find(':selected').attr('data-station-id');
        const return_station = $('#return_station').find(':selected').attr('data-station-id');
        console.log(departure_station, return_station)
        const q = query(
            collection(db, "journey"),
            where("departure_station_id", "==", departure_station),
            where("return_station_id", "==", return_station),
        );


        const querySnapshot = await getDocs(q);
        querySnapshot.forEach((doc) => {
            var station_row = `<tr id="${doc.id}">
                                    <td>${doc.data().departure_at}</td>
                                    <td>${doc.data().departure_station_name}</td>
                                    <td>${doc.data().return_at}</td>
                                    <td>${doc.data().return_station_name}</td>
                                    <td>${doc.data().distance}</td>
                                    <td>${doc.data().duration}</td>
                                    <td>
                                        <a href="journey_edit.php?journey_id=${doc.id}" class="btn btn-info">Edit</a>
                                         <span class="btn btn-danger delete-journey-btn" data-station-id="${doc.id}">Delete</span>
                                    </td>
                                  </tr>`;
            $('#journeys-list').append(station_row);
        });
        $('#journeys-list-table').DataTable();
        unblock_button();
    }

    async function journey_save(data) {
        block_button();
        try {
            const docRef = await addDoc(collection(db, "journey"), {
                departure_station_name: data.departure_station_name,
                departure_station_id: data.departure_station_id,
                return_station_name: data.return_station_name,
                return_station_id: data.return_station_id,
                departure_at: data.departure_at,
                return_at: data.return_at,
                distance: data.distance,
                duration: data.duration,

            });
            success_notify('Station created successfully');
            console.log("Document written with ID: ", docRef.id);
        } catch (e) {
            console.error('Error adding station', e);
        }
        unblock_button();
    }

    async function departure_return_dropdown() {
        var station_row = '';
        const querySnapshot = await getDocs(collection(db, "station"));
        querySnapshot.forEach((doc) => {
            station_row += `<option data-station-id="${doc.id}" value="${doc.data().station_name}">${doc.data().station_name}</option>`;
        });
        $('#departure_station').append(station_row);
        $('#return_station').append(station_row);
    }

    $('.journey-save-btn').click(function () {
        if (is_empty($('#distance').val())) {
            Lobibox.notify('error', {
                size: 'mini',
                sound: false,
                msg: 'Distance is required'
            });
            return false;
        }
        var data = {
            departure_station_name: $('#departure_station').val(),
            departure_station_id: $('#departure_station').find(':selected').attr('data-station-id'),
            return_station_name: $('#return_station').val(),
            return_station_id: $('#return_station').find(':selected').attr('data-station-id'),
            departure_at: $('#departure_at').val(),
            return_at: $('#return_at').val(),
            distance: $('#distance').val(),
            duration: $('#duration').val(),
        };
        journey_save(data);
    });

    async function delete_journey_by_id(journey_id) {
        await deleteDoc(doc(db, 'journey', journey_id));
        $(`#${journey_id}`).remove();
        success_notify('Journey deleted successfully');
    }

    $(document).on('click', '.delete-journey-btn', function () {
        var station_id = $(this).attr('data-station-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                delete_journey_by_id(station_id);
            }
        })
    });

    async function journey_get_by_id(journey_id) {
        const docRef = doc(db, "journey", journey_id);
        const docSnap = await getDoc(docRef);

        if (docSnap.exists()) {
            $('#distance').val(docSnap.data().distance);
            $('#duration').val(docSnap.data().duration);
            $('#departure_at').val(docSnap.data().departure_at);
            $('#return_at').val(docSnap.data().return_at);
            $('#journey_id').val(docSnap.id);
            $("#departure_station option[data-station-id='" + docSnap.data().departure_station_id + "']").prop("selected", true);
            $("#return_station option[data-station-id='" + docSnap.data().return_station_id + "']").prop("selected", true);

        } else {
            error_notify('No such station exists');
        }
    }

    $('.journey-update-btn').click(function () {
        if (is_empty($('#distance').val())) {
            error_notify('Distance is required');
            return false;
        }
        var data = {
            departure_station_name: $('#departure_station').val(),
            departure_station_id: $('#departure_station').find(':selected').attr('data-station-id'),
            return_station_name: $('#return_station').val(),
            return_station_id: $('#return_station').find(':selected').attr('data-station-id'),
            departure_at: $('#departure_at').val(),
            return_at: $('#return_at').val(),
            distance: $('#distance').val(),
            duration: $('#duration').val(),
            journey_id: $('#journey_id').val(),
        };
        journey_update(data)
    });

    async function journey_update(data) {
        console.log(data);
        block_button();
        try {
            const docRef = doc(db, 'journey', data.journey_id);
            await updateDoc(docRef, {
                departure_station_name: data.departure_station_name,
                departure_station_id: data.departure_station_id,
                return_station_name: data.return_station_name,
                return_station_id: data.return_station_id,
                departure_at: data.departure_at,
                return_at: data.return_at,
                distance: data.distance,
                duration: data.duration,

            });
            success_notify('Journey updated successfully');
        } catch (e) {
            error_notify('Error updating journey');
        }

        unblock_button()
    }

    /**********************END- JOURNEY FUNCTIONS**************************/

    $(document).ready(function () {
        var filename = window.location.pathname.split('/').pop();
        if (filename == 'station_list.php') {
            stations_list();
        } else if (filename == 'station_edit.php') {
            const station_id = new URLSearchParams(window.location.search).get('station_id');
            station_get_by_id(station_id);
        } else if (filename == 'journey_list.php') {
            departure_return_dropdown();
        } else if (filename == 'journey_create.php') {
            departure_return_dropdown();
        } else if (filename == 'journey_edit.php') {
            departure_return_dropdown();
            const journey_id = new URLSearchParams(window.location.search).get('journey_id');
            journey_get_by_id(journey_id);
        }
    });


    $('.journey-search-btn').click(function () {
        journeys_list();
    });
</script>
<script>
    function is_empty(val) {
        if (val == '' || val == '0' || val == 0 || val == 'undefined' || val == undefined || val == 'null' || val == null) {
            return true;
        }
        return false;
    }

    function success_notify(message = '') {
        Lobibox.notify('success', {
            size: 'mini',
            sound: false,
            msg: message
        });
    }

    function error_notify(message = '') {
        Lobibox.notify('error', {
            size: 'mini',
            sound: false,
            msg: message
        });
    }

    function block_button() {
        $('.submit-btn').attr('disabled', true);
        $('.fa-spinner').show();
    }

    function unblock_button() {
        $('.submit-btn').attr('disabled', false);
        $('.fa-spinner').hide();
    }

</script>
</body>

</html>
