<?php
header('Content-Type: application/json');
include('connection.php');

$query = "SELECT nama_calon, SUM(jumlah_vote) as hasil FROM calon_osis GROUP BY nama_calon";
$response = array();
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}
echo json_encode(array('data' => $response));
// echo json_encode($response);
