<?php
header('Content-Type: application/json');
include('connection.php');

$query = "SELECT calon_osis.nama_calon, ROUND(COUNT(calon_osis.id_calon)/(SELECT COUNT(hasil_voting.id_user) FROM hasil_voting)*100.0) AS jumlah_vote FROM hasil_voting INNER JOIN calon_osis ON calon_osis.id_calon = hasil_voting.id_calon GROUP BY hasil_voting.id_calon";
$response = array();
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}
echo json_encode(array('data_voting' => $response));
