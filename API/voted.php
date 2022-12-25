<?php
include('connection.php');
$timezone = new DateTimeZone('Asia/jakarta');
$date = new DateTime();
$date->setTimezone($timezone);

try {
    $idUser = $_POST['id_user'];
    $idCalon = $_POST['id_calon'];
    $tanggal = $date->format('Y-m-d H:i:s');

    $sql = "INSERT INTO hasil_voting (id_user, id_calon, tanggal) VALUES ('$idUser', '$idCalon', '$tanggal')";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $data = [
            'code' => 200,
            'message' => 'Terima kasih pemilihan anda berhasil'
        ];
    } else {
        $data = [
            'code' => 401,
            'message' => 'Anda sudah pernah memilih! 1 Akun hanya dapat menginput pemilihan sebanyak 1 Kali'
        ];
    }
    echo json_encode($data);
} catch (Exception $e) {
    echo $e;
    $data = [
        'succes' => false,
        'message' => 'failed :('
    ];
    echo json_encode($data);
}
