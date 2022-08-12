<?php
// Database connection credentials
$hostname = 'localhost:4307'; // specify host domain or IP, i.e. 'localhost' or '127.0.0.1' or server IP 'xxx.xxxx.xxx.xxx'
$database = 'happyinfancy'; // specify database name
$db_user = 'root'; // specify username
$db_pass = ''; // specify password
$con = mysqli_connect("$hostname", "$db_user", "$db_pass", "$database");
