<?php include("./template/_snippets/_header.php"); ?>
<?php include("./template/navbar.php"); ?>
<?php include("./database/koneksi.php"); ?>
<?php include("./code/get/barang2.php"); ?>

<div class="container mt-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_object($query)) { ?>
            <div class='col-md-3'>
                <div class="card" style="width: 18rem;">
                    <img src="images/<?= $row->gambar ?>" height="150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->nama ?></h5>
                        <strong>Rp. <?= $row->harga ?></strong>
                        <div class="d-grid gap-2 mt-3">
                            <a href="pembayaran.php?id=<?= $row->id ?>" class="btn btn-primary btn">pesan</a>
                        </div>

                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<?php include("./template/_snippets/_footer.php"); ?>