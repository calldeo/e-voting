<?php
header('Content-Type: application/json');
include('connection.php');

$query = "SELECT * FROM setting_waktu WHERE id_setting ='1'";
$response = array();
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $response = $row;
}
echo json_encode(array('data_date' => $response));
