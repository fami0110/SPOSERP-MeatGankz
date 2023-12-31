<?php Get::view('templates/header', $data) ?>

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
        width: 60px;
        height: 60px;
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
                    <div class="col-sm-8">
                        <h5 class="card-title">Menu</h5>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-end">
                        <button class="btn bg-gradient-primary mb-0 d-lg-block tombolTambahData" type="button" data-bs-toggle="modal"
                            data-bs-target="#formModal">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body pb-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 search" id="table"style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Foto</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama Menu</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Bahan</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kategori</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Tersedia</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data["menu"] as $menu): ?>
                                <tr>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <img src="<?= BASEURL ?>/img/datafoto/<?= $menu['foto'] ?>"
                                            alt="img <?= $menu['foto'] ?>" class="rounded img-fluid img-menu shadow"
                                            style="max-width: 150px; max-height: 10%">
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0 text-wrap">
                                        <?= $menu['nama']; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn bg-gradient-info rounded-pill tampilModalDetail m-0" 
                                            data-bs-toggle="modal" data-bs-target="#detailModal" 
                                            data-id="<?= $menu['id']; ?>">
                                            <i class="bi bi-search"></i>
                                        </a>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?php 
                                            $kategori = '-';
                                            foreach ($data['kategori'] as $item) {
                                                if ($item['id'] == $menu['kategori_id']) {
                                                    $kategori = $item['nama']; break;
                                                }   
                                            }
                                            echo $kategori;
                                        ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($menu['harga'], 0, '.', '.') ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if ($menu['tersedia']) : ?>
                                            <button type="button" class="btn btn-success m-0 rounded-pill">
                                                <?= $menu['tersedia'] ?> Porsi
                                            </button>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-danger m-0 rounded-pill">
                                                Habis
                                            </button>
                                        <?php endif ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="<?= BASEURL; ?>/menu/update/<?= $menu['id'] ?>" 
                                            class="btn bg-gradient-primary m-0 rounded-pill tampilModalUbah"
                                            data-bs-toggle="modal" data-bs-target="#formModal" 
                                            data-id="<?= $menu['id']; ?>">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="<?= BASEURL; ?>/menu/delete/<?= $menu['id'] ?>"
                                            class="btn bg-gradient-dark m-0 rounded-pill"
                                            onclick="return confirm ('Hapus data?')"> 
                                            <i class="bi bi-trash"></i>
                                        </a>
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
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="xxx" oninput="toTitleCase(this)" required>
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
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Rp" required>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Bahan</label>
                            <button class="btn btn-success p-0 px-2 fs-6" id="addItem" type="button">+</button>
                        </div>
                        <div id="bahan">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <button class="btn btn-danger m-0 px-3 removeItem" type="button">
                                            <i class="fa fa-xmark"></i>
                                        </button>
                                        <input type="text" class="form-control ps-2 nama-bahan" name="nama_bahan[]" placeholder="Nama Bahan" list="barang" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group d-flex">
                                        <input type="text" class="form-control position-static jumlah" name="jumlah_bahan[]" placeholder="0">
                                        <span class="input-group-text position-static satuan">..</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <datalist id="barang">
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <option value="<?= $barang['nama'] ?>">
                            <?php endforeach; ?>
                        </datalist>
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

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Bahan-Bahan</h1>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center fw-bold">Nama Bahan</th>
                            <th class="text-center fw-bold">Jumlah</th>
                            <th class="text-center fw-bold">Satuan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php 
$namaBarang = array_map(function ($item) {
    return [
        'id' => $item['id'],
        'nama' => $item['nama'],
        'satuan' => $item['satuan'],
    ];
}, $data['barang']);
?>

<script>
    var daftar_barang = JSON.parse(`<?= json_encode($namaBarang) ?>`);

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
        console.log(BASEURL);
        
        $('.tombolTambahData').on('click', function () {
            $('#modalLabel').html('Tambah Data')
            $('#formModal .modal-footer button[type=submit]').html('Simpan');
            $("#formModal .modal-body form").attr("action", `${BASEURL}/insert`);
            $("#formModal .modal-body form")[0].reset();
            $("#bahan").html(`
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <button class="btn btn-danger m-0 px-3 removeItem" type="button">
                                <i class="fa fa-xmark"></i>
                            </button>
                            <input type="text" class="form-control ps-2 nama-bahan" name="nama_bahan[]" placeholder="Nama Bahan" list="barang" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group d-flex">
                            <input type="text" class="form-control position-static rounded-end-0 jumlah-bahan" name="jumlah_bahan[]" placeholder="0" required>
                            <span class="input-group-text position-static satuan">..</span>
                        </div>
                    </div>
                </div>
            `);
            refreshEvent();
        });

        $(".tampilModalUbah").click(function () {
            const id = $(this).data("id");

            $("#modalLabel").html("Ubah Data");
            $("#formModal .modal-footer button[type=submit]").html("Ubah Data");
            $("#formModal .modal-body form").attr("action", `${BASEURL}/update/${id}`);

            $.ajax({
                url: `${BASEURL}/getubah/${id}`,
                method: "get",
                dataType: "json",
                success: function (data) {
                    $('#nama').val(data.nama);
                    $('#harga').val(data.harga);
                    $("#kategori_id").val(data.kategori_id);

                    $("#bahan").html('');
                    bahan = JSON.parse(data.bahan);
                    for (let key in bahan) {
                        addList(key, bahan[key], daftar_barang.find(item => item.nama == key).satuan)
                    }

                    refreshEvent();
                },
            });
        });

        $(".tampilModalDetail").click(function() {
            const id = $(this).data("id");

            $.ajax({
                url: `${BASEURL}/getubah/${id}`,
                method: "post",
                dataType: "json",
                success: function(result) {
                    data = JSON.parse(result.bahan);
                    $('#detailModal .modal-body table tbody').html('');
                    for (let key in data) {
                        $('#detailModal .modal-body table tbody').append(`
                            <tr>
                                <td>${key}</td>
                                <td>${data[key]}</td>
                                <td>${daftar_barang.find(item => item.nama == key).satuan}</td>
                            </tr>`
                        );
                    }
                },
            });
        });
    });
</script>

<script src="<?= BASEURL ?>/js/custom/menu.js"></script>

<?php Get::view('templates/footer', $data) ?>