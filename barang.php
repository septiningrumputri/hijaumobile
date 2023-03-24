<?php
include("./template/_snippets/_header.php");
include("./database/koneksi.php");
include("./code/get/barang.php");
?>
<div class="container mt-5">
    <button type="button" onclick="uploadData()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Barang</button>

    <!-- modal upload -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id='form' action="" method="POST" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" id='file' class="form-control" name='gambar' />
                    <input type='number' name="id" id='id-barang' style="display: none" />
                    <input id='nama' type="text" name='nama' class="form-control mt-2" placeholder="Nama Barang" />
                    <input id='harga' type="number" name='harga' class="form-control mt-2" placeholder="Harga" />
                    <input id='petani' type="text" name='petani' class="form-control mt-2" placeholder="Nama Petani" />
                    <input id='kontak' type="text" name='kontak' class="form-control mt-2" placeholder="Nomor Petani" />
                    <textarea class="form-control mt-2" id='deskripsi' placeholder="Deskripsi" name='deskripsi'></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id='submitbtn' class="btn btn-primary">Upload Barang</button>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Petani</th>
                <th>Kontak Petani</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            while ($row = mysqli_fetch_object($query)) {
                $no += 1; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->nama ?></td>
                    <td>Rp. <?= $row->harga ?></td>
                    <td><?= $row->petani ?></td>
                    <td><?= $row->kontak ?></td>
                    <td>
                        <a href="/hijaumobile/code/delete/barang.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger">hapus</a>
                        <button onclick="getBarang(<?= $row->id ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-warning">edit</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    // form
    const file = document.querySelector("#file")
    const id_barang = document.querySelector("#id-barang")
    const nama = document.querySelector("#nama")
    const harga = document.querySelector("#harga")
    const petani = document.querySelector("#petani")
    const kontak = document.querySelector("#kontak")
    const form = document.querySelector("#form")
    const deskripsi = document.querySelector("#deskripsi")

    const submitbtn = document.querySelector("#submitbtn")

    function uploadData() {
        file.disabled = false
        file.setAttribute("required", true)
        nama.value = ""
        harga.value = ""
        petani.value = ""
        kontak.value = ""
        deskripsi.value = ""
        form.setAttribute("action", "/hijaumobile/code/insert/barang.php")
        submitbtn.innerHTML = "Upload Barang"
    }


    function handleDelete(e) {
        e.preventDefault()
        const tanya = window.prompt("Apakah anda yakin ?")
        return false
    }

    function getBarang(id) {

        file.disabled = true
        submitbtn.innerHTML = "Update Barang"
        file.setAttribute("required", false)
        form.setAttribute("action", "/hijaumobile/code/update/barang.php")

        const xhr = new XMLHttpRequest()
        xhr.onload = function() {
            if (xhr.status === 200 && xhr.readyState === 4) {
                let res = JSON.parse(xhr.responseText)[0]
                nama.value = res.nama
                harga.value = res.harga
                petani.value = res.petani
                kontak.value = res.kontak
                id_barang.value = res.id
                deskripsi.value = res.deskripsi
                id_barang.setAttribute("value", res.id)
            }
        }

        xhr.open("GET", `/hijaumobile/code/get/barang-detail.php?id=${id}`)
        xhr.send()
    }
</script>
<?php include("./template/_snippets/_footer.php"); ?>