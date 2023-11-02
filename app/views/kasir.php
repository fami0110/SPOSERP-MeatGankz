<?php require_once "templates/header.php" ?>

<style>
    .card-img-top {
        object-fit: cover;
        height: 150px;
        width: 100%;
    }
</style>


<div class="row">
    <!-- <div class="col-12">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex">
                    <button class="btn btn-info  ms-2 mt-4" style="width: 50%">New Sale</button>
                    <button class="btn btn-info ms-2 me-2 mt-4" style="width: 50%">Today Sale</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3>Cari Produk</h3>
        <div class="row">
            <div class="col-md-12 mb-2">
                <label for="inputPertama">Pilih kategori:</label>
                <select id="inputPertama" class="form-select" style="width: 100%;">
                    <option value="">Pilih Kategori...</option>
                    <option value="1">Semua Kategori</option>
                    <option value="2">Daging</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputKedua">Cari Product:</label>
                        <input type="text" id="inputKedua" class="form-control" placeholder="Cari..."
                            style="width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <label for="inputKetiga">Pilih Product:</label>
                        <select id="inputKetiga" class="form-select" style="width: 100%;">
                            <option value="">Pilih opsi...</option>
                            <option value="A">Steak</option>
                            <option value="B">Daging</option>
                            <option value="C">Sayur</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <h4>Cari Produk Dengan Code..</h4>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <input type="text" id="inputKedua" class="form-control" placeholder="Barcode or Scan Qr"
                            style="width: 100%;">
                    </div>
                    <div class="col-md-6 mt-2">
                        <input type="text" id="inputKedua" class="form-control" placeholder="Manual input Code"
                            style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            Tombol dengan panjang yang sama
            <div class="col-md-12 mt-3">
                <a href="<?= BASEURL; ?>/customer" class="btn btn-success"style="width: 100%">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Customer
                </a>
            </div>
        </div>
    </div> -->
    <div class="col-lg-6" style="max-height: calc(100vh - 100px); overflow-y: auto;">
        <div class="container-fluid pt-1 mb-4 border-bottom sticky-top bg-gray-100" style="white-space: nowrap; overflow-x: auto;">
            <input type="radio" 
                class="btn-check filter-kategori" 
                data-kategori="all" 
                name="kategori" id="kategori-all" checked>
            <label class="btn btn-outline-primary rounded-pill" for="kategori-all">
                All
            </label>
            <?php foreach ($data['kategori'] as $kategori) : ?>
            <input type="radio" 
                class="btn-check filter-kategori" 
                data-kategori="<?= strtolower($kategori['nama']) ?>" 
                name="kategori" id="kategori-<?= $kategori['nama'] ?>">
            <label class="btn btn-outline-primary rounded-pill" for="kategori-<?= $kategori['nama'] ?>">
                <?= $kategori['nama'] ?>
            </label>
            <?php endforeach; ?>
        </div>

        <?php foreach ($data['kategori'] as $kategori) : ?>
            <div class="container-fluid mb-3 kategori-menu <?= strtolower($kategori['nama']) ?>">
                <h5 class="mb-4 align-bottom">
                    <svg class="mb-1 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="32">
                        <path d="M190.58-513.333q-40.385 0-68.41-28.308t-28.025-68.504V-769.42q0-40.385 28.025-68.598 28.025-28.214 68.41-28.214h159.652q39.819 0 68.127 28.214 28.308 28.213 28.308 68.598v159.275q0 40.196-28.308 68.504-28.308 28.308-68.127 28.308H190.58Zm0 419.188q-40.385 0-68.41-28.025t-28.025-68.41v-159.652q0-39.819 28.025-68.127 28.025-28.308 68.41-28.308h159.652q39.819 0 68.127 28.308 28.308 28.308 28.308 68.127v159.652q0 40.385-28.308 68.41t-68.127 28.025H190.58Zm419.565-419.188q-40.196 0-68.504-28.308-28.308-28.308-28.308-68.504V-769.42q0-40.385 28.308-68.598 28.308-28.214 68.504-28.214H769.42q40.385 0 68.598 28.214 28.214 28.213 28.214 68.598v159.275q0 40.196-28.214 68.504-28.213 28.308-68.598 28.308H610.145Zm0 419.188q-40.196 0-68.504-28.025-28.308-28.025-28.308-68.41v-159.652q0-39.819 28.308-68.127 28.308-28.308 68.504-28.308H769.42q40.385 0 68.598 28.308 28.214 28.308 28.214 68.127v159.652q0 40.385-28.214 68.41-28.213 28.025-68.598 28.025H610.145Z" />
                    </svg>
                    <?= $kategori['nama'] ?>
                </h5>
                <div class="row">
                    <?php foreach ($data["menu"] as $menu) : ?>
                        <?php if ($menu['kategori_id'] !== $kategori['id']) continue ?>
                        <div class="col-sm-4 mb-4 menu" 
                            data-tersedia="<?= ($menu['tersedia']) ? 'true' : 'false' ?>"
                            data-nama="<?= $menu['nama'] ?>"
                            data-harga="<?= $menu['harga'] ?>"
                        >
                            <button class="card w-100 h-100 animation-card addProductSale p-0">
                                <img src="<?= BASEURL ?>/img/datafoto/<?= $menu['foto'] ?>" alt="img <?= $menu['foto'] ?>" class="card-img-top">
                                <div class="card-body d-flex flex-column justify-content-between text-start pb-0">
                                    <h7 class="card-title"><?= $menu['nama']; ?></h7>
                                    <div>
                                        <h6 class="card-subtitle my-2 text-sm text-muted">
                                            Rp <?= number_format($menu['harga'], 0, '.', '.') ?>
                                        </h6>
                                        <h6 class="card-subtitle mb-3 text-md text-<?= ($menu['tersedia']) ? 'success' : 'danger' ?>">
                                            <?= ($menu['tersedia']) ? 'Tersedia' : 'Habis' ?>
                                        </h6>
                                    </div>
                                </div>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>

    <div class="col-lg-6">
        <div class="card" style="height: calc(100vh - 120px); overflow-y: auto;">
            <div class="card-body">
                <form action="<?= BASEURL ?>/kasir/insert" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-id-card-alt ps-2"></i>
                        </span>
                        <input type="text" class="form-control ps-2" name="kasir" value="<?= $data['user']['username'] ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-user ps-2"></i>
                        </span>
                        <input type="text" class="form-control ps-2" name="pelanggan" value="Customer">
                    </div>

                    <div class="d-flex justify-content-between border-top pt-3 mt-4">
                        <label class="col-form-label">Daftar Belanja</label>
                        <button type="button" class="btn btn-danger rounded-pill" id="clear">Clear All Items</button>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-6 py-1 text-sm">
                            Item
                        </div>
                        <div class="col-sm-2 py-1 ps-0 text-sm">
                            Amount
                        </div>
                        <div class="col-sm-4 py-1 ps-0 text-sm">
                            Subtotal
                        </div>
                    </div>
                    <div id="daftar-belanja" class="border-bottom pb-3 mb-2">
                    </div>

                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="idTransaksi" class="col-lg-12 col-form-label">Subtotal</label>
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">Rp. </span>
                                    <input type="number" class="form-control ps-2" id="subtotal" name="subtotal" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="idTransaksi" class="col-lg-12 col-form-label">
                                    Pajak <span class="badge badge-warning">(<?= $data['pajak'] ?>%)</span>
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">Rp. </span>
                                    <input type="number" class="form-control ps-2" id="pajak" name="pajak" value="0" data-pajak="<?= $data['pajak'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="idTransaksi" class="col-lg-12 col-form-label">Total</label>
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">Rp. </span>
                                    <input type="number" class="form-control ps-2"  id="total" name="total" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="col-lg-12 col-form-label">Pembayaran</label>
                                <select name="metode_pembayaran" id="pembayaran" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="debit">Debit</option>
                                    <option value="kredit">Kredit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 kode-transaksi" style="display: none;">
                            <label for="" class="col-lg-12 col-form-label">Kode Transaksi</label>
                            <div class="input-group mb-3">
                                <span class="input input-group-text" id="button-addon1">
                                    <i class="fa fa-lock ps-2"></i>
                                </span>
                                <input type="text" class="form-control ps-2" id="kode_transaksi" name="kode_transaksi" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="col-lg-12 col-form-label">Bayar</label>
                            <div class="input-group mb-3">
                                <span class="input input-group-text" id="button-addon1">Rp. </span>
                                <input type="number" class="form-control ps-2" id="bayar" name="bayar" value="0" min="0">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="col-lg-12 col-form-label">Kembalian</label>
                            <div class="input-group mb-3">
                                <span class="input input-group-text" id="button-addon1">Rp. </span>
                                <input type="number" class="form-control ps-2" id="kembali" name="kembali" value="0" min="0" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row p-2" style="flex-wrap: wrap;">
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-success rounded-pill"
                                style="white-space: nowrap"
                                data-value="pas">Uang Pas</button>
                        </div>
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-secondary rounded-pill"
                                style="white-space: nowrap"
                                data-value="10000">Rp. 10.000</button>
                        </div>
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-secondary rounded-pill"
                                style="white-space: nowrap"
                                data-value="20000">Rp. 20.000</button>
                        </div>
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-secondary rounded-pill"
                                style="white-space: nowrap"
                                data-value="50000">Rp. 50.000</button>
                        </div>
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-secondary rounded-pill"
                                style="white-space: nowrap"
                                data-value="100000">Rp. 100.000</button>
                        </div>
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-secondary rounded-pill"
                                style="white-space: nowrap"
                                data-value="200000">Rp. 200.000</button>
                        </div>
                        <div class="col-sm-3 px-1">
                            <button type="button" 
                                class="instant-pay w-100 px-0 text-center btn btn-outline-secondary rounded-pill"
                                style="white-space: nowrap"
                                data-value="500000">Rp. 500.000</button>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <!-- <a href="" class="btn btn-info me-2 mb-0">
                                <i class="fa fa-print me-2"></i>
                                Print
                            </a> -->
                            <button type="button" class="btn btn-primary mb-0 submit-form">
                                <i class="fa fa-save me-2"></i>
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="myCalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Customer baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-circle"></i></button>
            </div>
            <div class="container">
                <input type="text" class="display" />
                <div class="buttons">
                    <button class="operator" data-value="AC">AC</button>
                    <button class="operator" data-value="DEL">DEL</button>
                    <button class="operator" data-value="%">%</button>
                    <button class="operator" data-value="/">/</button>
                    <button data-value="7">7</button>
                    <button data-value="8">8</button>
                    <button data-value="9">9</button>
                    <button class="operator" data-value="*">*</button>
                    <button data-value="4">4</button>
                    <button data-value="5">5</button>
                    <button data-value="6">6</button>
                    <button class="operator" data-value="-">-</button>
                    <button data-value="1">1</button>
                    <button data-value="2">2</button>
                    <button data-value="3">3</button>
                    <button class="operator" data-value="+">+</button>
                    <button data-value="0">0</button>
                    <button data-value="00">00</button>
                    <button data-value=".">.</button>
                    <button class="operator" data-value="=">=</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script src="<?= BASEURL ?>/js/custom/kasir.js"></script>
<!-- <script src="<?= BASEURL ?>/js/datatables.js"></script>
<script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-basic", {
        searchable: true,
        fixedHeight: true
    });
</script> -->

<?php require_once "templates/footer.php" ?>