<?php require_once "templates/header.php" ?>

<style>
    body {
        background: white;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        margin: 80px;
        align-items: center;
        grid-gap: 30px;
    }

    .card-img-top {
        object-fit: cover;
        height: 230px;
        width: 100%;
    }

    .img-menu {
        object-fit: cover;
        width: 80px;
        height: 80px;
    }

    grid>article {
        box-shadow: 10px 5px 5px 0px black;
        border-radius: 20px;
        text-align: center;
        background: white;
    }

    .animation-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, 0.125);
        border-radius: 1rem;
        transition: transform 0.3s ease-in-out
    }

    .animation-card:hover {
        transform: scale(1.03);
    }
</style>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title">Menu</h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <button class="btn bg-gradient-primary d-lg-block tombolTambahData" type="button" data-bs-toggle="modal"
                                data-bs-target="#formModal">
                                Tambah Data Menu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" card-body px-0 pt-0 pb-3">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 datatable-basic">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Foto</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama Menu</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kategori</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Status Menu</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($data["menu"] as $menu): ?>
                                <tr>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0">
                                            <?= $i++; ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <img src="<?= BASEURL ?>/img/datafoto/<?= $menu['foto'] ?>"
                                            alt="img <?= $menu['foto'] ?>" class="rounded img-fluid img-menu shadow"
                                            style="max-width: 150px; max-height: 10%">
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0 text-wrap">
                                            <?= $menu['nama']; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0">
                                           <?php 
                                                $kategori = '-';
                                                
                                                foreach ($data['kategori'] as $item) {
                                                    if ($item['id'] == $menu['kategori_id']) {
                                                        $kategori = $item['nama']; break;
                                                    }
                                                }

                                                echo $kategori;
                                           ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center font-weight-bold mb-0">
                                            Rp <?= number_format($menu['harga'], 0, '.', '.') ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if ($menu['tersedia']) : ?>
                                            <a 
                                                class="btn btn-success m-0"
                                                href="<?= BASEURL ?>/menu/updateStatusMenu/<?= $menu['id'] ?>/0"
                                                onclick="return confirm(`Apakah anda yakin ingin mengubah data status menjadi 'Habis'`)">
                                                Tersedia
                                            </a>
                                        <?php else : ?>
                                            <a 
                                                class="btn btn-danger m-0"
                                                href="<?= BASEURL ?>/menu/updateStatusMenu/<?= $menu['id'] ?>/1"
                                                onclick="return confirm(`Apakah anda yakin ingin mengubah data status menjadi 'Tersedia'`)">
                                                Habis
                                            </a>
                                        <?php endif ?>
                                        
                                    </td>
                                    <td class="align-middle text-center">
                                        <a 
                                            class="btn bg-gradient-primary m-0 tampilModalUbah"
                                            href="<?= BASEURL; ?>/menu/update/<?= $menu['id'] ?>" 
                                            data-bs-toggle="modal" data-bs-target="#formModal" 
                                            data-id="<?= $menu['id']; ?>">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a 
                                            class="btn bg-gradient-dark m-0"
                                            href="<?= BASEURL; ?>/menu/delete/<?= $menu['id'] ?>"
                                            onclick="return confirm ('Hapus data?')"> 
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= BASEURL ?>/menu/insert" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" name="nama" id="nama" oninput="toTitleCase(this)" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label" required>Kategori</label>
                        <select class="form-control" name="kategori_id" id="kategori_id">
                            <?php foreach ($data['kategori'] as $kategori): ?>
                                <option value="<?= $kategori['id'] ?>"> <?= $kategori['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="tersedia" class="form-label">Status Menu</label>
                        <select class="form-control" name="tersedia" id="tersedia" required>
                            <option value="1" selected>Tersedia</option>
                            <option value="0">Habis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept=".png, .jpg, .jpeg, .gif">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?= BASEURL ?>/js/datatables.js"></script>

<script>
    function toTitleCase(input) {
        let text = input.value;
        let words = text.split(' ');

        for (let i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
        }

        let titleCaseText = words.join(' ');

        input.value = titleCaseText;
    }


    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }


    $(document).ready(function () {
        const BASEURL = window.location.href;
        console.log(BASEURL)
        $('.tombolTambahData').on('click', function () {
            $('#modalLabel').html('Tambah Data')
            $('.modal-footer button[type=submit]').html('Simpan');
            $(".modal-body form")[0].reset();
            $(".modal-body form").attr("action", `${BASEURL}/insert`);
        });

        $(".tampilModalUbah").click(function () {
            const id = $(this).data("id");

            $("#modalLabel").html("Ubah Data");
            $(".modal-footer button[type=submit]").html("Ubah Data");
            $(".modal-body form").attr("action", `${BASEURL}/update/${id}`);

            $.ajax({
                url: `${BASEURL}/getubah/${id}`,
                method: "get",
                dataType: "json",
                success: function (data) {
                    $('#nama').val(data.nama);
                    $('#harga').val(data.harga);
                    $("#kategori_id").val(data.kategori_id);
                    $('#tersedia').val(data.tersedia);
                    console.log(data);
                },
            })
        })
    });
</script>

<?php require_once "templates/footer.php" ?>