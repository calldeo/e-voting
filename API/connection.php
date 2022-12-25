<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_simpeosisv1');

$koneksi = mysqli_connect(HOST, USER, PASS, DB) or die('unable connection');
