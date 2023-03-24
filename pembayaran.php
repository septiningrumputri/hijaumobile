<?php include("./template/_snippets/_header.php"); ?>
<?php include("./template/navbar.php"); ?>
<?php
include("./database/koneksi.php");
$id = strip_tags($_GET['id']);
$sql = mysqli_query($con, "SELECT * FROM barang WHERE id = $id")
?>

<style>
    .hide-alert {
        display: none;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <?php while ($row = mysqli_fetch_object($sql)) { ?>
                <img style="width: 100%; height: 350px;" src="./images/<?= $row->gambar ?>" />
                <h2 class="mt-5"><?= $row->nama ?></h2>
                <h4 style="color: #666666;">Rp. <?= $row->harga ?></h4>
                <small><?= $row->petani ?> - <?= $row->kontak ?></small>
                <hr />
                <p><?= $row->deskripsi ?> </p>
            <?php } ?>
        </div>
        <form class="col-md-6" id='form' method="POST" action="code/insert/pembayaran.php">
            <div class="alert alert-success hide-alert" role="alert">
                <h4 class="alert-heading">Berhasil..</h4>
                <p>Pembelian anda sedang kami proses, silahkan ditunggu</p>
                <hr>
                <p class="mb-0">Terimakasih sudah berbelanja di website kami</p>
            </div>
            <input type='number' name='id_produk' style="display: none;" value="<?= $id ?>" />
            <input type='text' id='input' name='nama' placeholder="Nama Lengkap" class="form-control" />
            <input type='text' id='input' name='alamat' placeholder="Alamat Lengkap" class="form-control mt-3" />
            <input type='text' id='input' name='kontak' placeholder="Nomor Hp" class="form-control mt-3" />
            <button type="submit" class="btn btn-primary mt-4">Pesan Sekarang</button>
        </form>
    </div>
</div>

<script>
    function handleSubmit(f) {
        f.preventDefault()
        const alert = document.querySelector(".alert")
        alert.classList.remove("hide-alert")

        const input = document.querySelectorAll("#input")
        for (let i = 0; i < input.length; i++) {
            input[i].value = ''
        }

        setTimeout(() => {
            window.location.href = "/hijaumobile/"
        }, 3000);
    }


    const form = document.querySelector("#form")
    form.addEventListener("submit", f => {
        handleSubmit(f)
    })
</script>

<?php include("./template/_snippets/_footer.php"); ?>