<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_simpeosis');

$koneksi = mysqli_connect(HOST, USER, PASS, DB) or die('unable connection');
