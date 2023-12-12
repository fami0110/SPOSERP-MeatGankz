
<?php Get::view('templates/header', $data) ?>

<style>
    .card-img-top {
        object-fit: cover;
        height: 150px;
        width: 100%;
    }
</style>


<div class="row">
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
                            data-id="<?= $menu['id'] ?>"
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
                <form action="<?= BASEURL ?>/pesanan/update/<?= $data['pesanan']['id'] ?>" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-id-card-alt ps-2"></i>
                        </span>
                        <input type="text" class="form-control ps-2" name="kasir" value="<?= $data['pesanan']['kasir'] ?>" required readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-user ps-2"></i>
                        </span>
                        <input type="text" class="form-control ps-2" name="pelanggan" value="<?= $data['pesanan']['pelanggan'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-phone ps-2"></i>
                        </span>
                        <input type="text" class="form-control ps-2" name="nomor_telp" value="<?= $data['pesanan']['nomor_telp'] ?>" placeholder="08xxx" required>
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
                        <?php foreach (json_decode($data['pesanan']['detail_pembayaran'], true) as $item) : ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="id" type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                    <div class="input-group mb-3">
                                        <button class="btn btn-danger m-0 removeList" type="button" data-nama="<?= $item['item'] ?>">
                                            <i class="fa fa-xmark"></i>
                                        </button>
                                        <input type="text" class="item form-control ps-3" name="item[]" value="<?= $item['item'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2 ps-0">
                                    <input type="number" class="amount form-control ps-2" name="amount[]" data-nama="<?= $item['item'] ?>" value="<?= $item['amount'] ?>" min="1">
                                </div>
                                <div class="col-sm-4 ps-0">
                                    <div class="input-group mb-3">
                                        <span class="input input-group-text">Rp. </span>
                                        <input type="number" class="subtotal form-control ps-2" name="item_subtotal[]" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                                    <option value="cash" <?= $data['pesanan']['metode_pembayaran'] == 'cash' ? 'selected' : '' ?>>Cash</option>
                                    <option value="debit" <?= $data['pesanan']['metode_pembayaran'] == 'debit' ? 'selected' : '' ?>>Debit</option>
                                    <option value="kredit" <?= $data['pesanan']['metode_pembayaran'] == 'kredit' ? 'selected' : '' ?>>Kredit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 kode-transaksi" <?= $data['pesanan']['metode_pembayaran'] == 'cash' ? 'style="display: none"' : '' ?>>
                            <label for="" class="col-lg-12 col-form-label">Kode Transaksi</label>
                            <div class="input-group mb-3">
                                <span class="input input-group-text" id="button-addon1">
                                    <i class="fa fa-lock ps-2"></i>
                                </span>
                                <input type="text" class="form-control ps-2" id="kode_transaksi" name="kode_transaksi" value="<?= $data['pesanan']['kode_transaksi'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="" class="col-lg-12 col-form-label">Bayar</label>
                            <div class="input-group mb-3">
                                <span class="input input-group-text" id="button-addon1">Rp. </span>
                                <input type="number" class="form-control ps-2" id="bayar" name="bayar" value="<?= $data['pesanan']['bayar'] ?>" min="0">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="col-lg-12 col-form-label">Kembalian</label>
                            <div class="input-group mb-3">
                                <span class="input input-group-text" id="button-addon1">Rp. </span>
                                <input type="number" class="form-control ps-2" id="kembali" name="kembali" value="<?= $data['pesanan']['kembali'] ?>" min="0" readonly>
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


<script src="<?= BASEURL ?>/js/custom/kasir.js"></script>
<script>
    document.querySelectorAll('#daftar-belanja > *').forEach(row => {
        let nama = row.querySelector('input.item').value;
        let id = row.querySelector('input[name="id[]"]').value;
        let price = parseInt(document.querySelector(`.menu[data-id="${id}"]`).dataset.harga);

        row.querySelector('input.subtotal').value = price;
        selected_menu[nama] = price;

        refreshAmountEvent();
    });
</script>

<?php Get::view('templates/footer', $data) ?>