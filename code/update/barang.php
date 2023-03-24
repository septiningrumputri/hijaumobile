<?php

include("../../database/koneksi.php");

if (isset($_POST)) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $petani = $_POST['petani'];
    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE barang SET nama='$nama', harga=$harga, petani='$petani', kontak='$kontak', deskripsi='$deskripsi' where id = $id";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: /hijaumobile/barang.php");
    }
}
