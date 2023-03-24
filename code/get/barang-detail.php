<?php
include("../../database/koneksi.php");

$id = mysqli_real_escape_string($con, strip_tags($_GET['id']));
$sql = mysqli_query($con, "SELECT * FROM barang WHERE id = $id");
$arr = [];

while ($row = mysqli_fetch_object($sql)) {
    array_push($arr, [
        "id" => $row->id,
        "nama" => $row->nama,
        "harga" => $row->harga,
        "petani" => $row->petani,
        "kontak" => $row->kontak,
        "deskripsi" => $row->deskripsi
    ]);
}

echo json_encode($arr);
