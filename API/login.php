<?php
include('connection.php');

$user = $_POST['username'];
$pass = md5($_POST['password']);

$query_check = "SELECT * FROM users WHERE username = '$user'";
$check = mysqli_fetch_array(mysqli_query($koneksi, $query_check));
$json_array = array();
$response = "";

if (isset($check)) {
    $query_check_pass = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $query_pass_result = mysqli_query($koneksi, $query_check_pass);
    $check_password = mysqli_fetch_array($query_pass_result);
    if (isset($check_password)) {
        $query_pass_result = mysqli_query($koneksi, $query_check_pass);
        while ($row = mysqli_fetch_assoc($query_pass_result)) {
            $json_array = $row;
        }
        $response = array(
            'code' => 200,
            'status' => 'Succes',
            'user' => $json_array
        );
    } else {
        $response = array(
            'code' => 401,
            'status' => 'Password_salah',
            'user' => $json_array
        );
    }
} else {
    $response = array(
        'code' => 404,
        'status' => 'Data tidak ditemukan, lanjutkan registrasi?',
        'user' => $json_array
    );
}
print(json_encode($response));
mysqli_close($koneksi);
