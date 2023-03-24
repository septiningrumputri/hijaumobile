<?php
include("../../database/koneksi.php");

if (isset($_POST)) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $id_produk = $_POST['id_produk'];

    $sql = "INSERT INTO pembayaran(nama, alamat, nomorhp, barang_id) VALUES ('$nama', '$alamat', '$kontak', $id_produk)";
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: /hijaumobile");
    }
}
