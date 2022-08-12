</div>
<!-- /.container -->
<!--<footer style="position: fixed; bottom: 0;text-align: center">
    <div class="small-print">
        <div class="container">
            <p>Copyright &copy; happyinfancy.com 2022 </p>
        </div>
    </div>
</footer>-->
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

    $(document).ready(function () {
        $('.select2').select2();
        $('#stations-list-table').DataTable();
    });

</script>
</body>

</html>
