<?php
header('Content-Type: application/json');
include('connection.php');

$query = "SELECT * FROM calon_osis";
$response = array();
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}
echo json_encode($response);
