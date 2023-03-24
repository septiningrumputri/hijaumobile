<?php
include("../../database/koneksi.php");
if (isset($_POST)) {
    // gambar produk
    $tmp_gambar = $_FILES['gambar']['tmp_name'];
    $nama_gambar = $_FILES['gambar']['name'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $petani = $_POST['petani'];
    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];

    // masukan data ke database
    $sql = "INSERT INTO barang(nama, harga, petani, kontak, gambar, deskripsi) VALUES ('$nama', $harga, '$petani', '$kontak', '$nama_gambar', '$deskripsi')";
    $query = mysqli_query($con, $sql);

    // upload gambar

    move_uploaded_file($tmp_gambar, "../../images/" . $nama_gambar);

    if ($query) {
        header("Location: /hijaumobile/barang.php");
    }
}
