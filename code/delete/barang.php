<?php
include("../../database/koneksi.php");

$id = $_GET['id'];
$sql = mysqli_query($con, "DELETE FROM barang WHERE id = $id");

if ($sql) {
    header("Location: /hijaumobile/barang.php");
}
