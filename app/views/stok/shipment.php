<?php Get::view('templates/header', $data) ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Shipment</h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-end">
                            <button class="btn bg-gradient-primary d-lg-block tombolTambahData" type="button" data-bs-toggle="modal" data-bs-target="#formModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 pb-3">
                <div class="table-responsive">
                    <table class="table table-bordered align-items-center mb-0" style="border-collapse: collapse;" id="table">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    No</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Deskripsi</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Pesan</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Berat</th>
                                <th colspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga EXW</th>
                                <th colspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Biaya Lainnya</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Diskon</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Total</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga All In / Kg</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Supplier</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No Akun</th>
                                <th rowspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga / Kg</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Subotal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    List</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data["shipment"] as $shipment) : ?>
                                <tr>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= date('d/m/Y', strtotime($shipment['tanggal'])) ?>
                                    </td>
                                    <td class="text-sm text-start font-weight-bold mb-0">
                                        <?= $shipment['deskripsi'] ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $shipment['pesan'] ?> <?= $data['satuan'][$shipment['stok_id']] ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $shipment['berat'] ?> gram
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($shipment['harga_exw'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($shipment['total_exw'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?php foreach (json_decode($shipment['biaya_lainnya'], true) as $key => $val) : ?>
                                            - <?= $key ?> : <?= number_format($val, 0, ',', '.') ?> <br>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($shipment['total_biaya_lainnya'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($shipment['diskon'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($shipment['total'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($shipment['harga_all_in'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?php foreach ($data['supplier'] as $supplier) : ?>
                                            <?= ($supplier['id'] == $shipment['supplier_id']) ? $supplier['nama'] : '' ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $shipment['no_akuntansi'] ?>
                                    </td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">
                                        <button type="button"
                                            class="btn bg-gradient-primary btn-md  p-1 px-2 mb-0 align-middle acc-button tampilModalUbah" 
                                            data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $shipment['id'] ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a href="<?= BASEURL ?>/shipment/delete/<?= $shipment['id'] ?>" 
                                            class="btn bg-gradient-dark btn-md  p-1 px-2 mb-0 align-middle acc-button"
                                            onclick="return confirm('Hapus data?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/shipment/insert" method="post">
                <div class="row mb-3 gy-2">
                    <div class="col-lg-6">
                        <label class="form-label" for="stok_id">Nama Barang</label>
                        <input type="text" class="form-control" name="stok_id" id="stok_id" list="barang" autocomplete="off" placeholder="Nama Barang" required>
                        <datalist id="barang">
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <option value="<?= $barang['nama'] ?>" 
                                    data-satuan="<?= $barang['satuan'] ?>">
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="no_akuntansi">No Akun</label>
                        <input type="text" class="form-control" name="no_akuntansi" id="no_akuntansi" placeholder="113">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="supplier_id">Supplier</label>
                        <select class="form-select" name="supplier_id" id="supplier_id" required>
                            <?php foreach ($data['supplier'] as $supplier) : ?>
                                <option value="<?= $supplier['id'] ?>"><?= $supplier['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi barang" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label d-block" for="pesan">Pesan</label>
                        <div class="row pe-3">
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="pesan" placeholder="0" name="pesan" min="0">
                            </div>
                            <div class="col-sm-2 px-0">
                                <input type="text" class="form-control" id="satuan" value="<?= $data['barang'][0]['satuan'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label d-block" for="berat">Berat</label>
                        <div class="row pe-3">
                            <div class="col-sm-10">
                                <input type="number" class="form-control count" id="berat" placeholder="0" name="berat" min="0">
                            </div>
                            <div class="col-sm-2 px-0">
                                <input type="text" class="form-control" value="gram" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 border-top pt-2 mt-4">
                    <div class="col-md-6">
                        <label class="form-label" for="harga_exw">Harga EXW / Kg</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control ps-2 count" name="harga_exw" id="harga_exw" placeholder="0" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="total_exw">Total EXW</label>
                        <div class="input-group bg-light">
                            <span class="input-group-text bg-transparent">Rp</span>
                            <input type="number" class="form-control ps-2 bg-transparent" name="total_exw" id="total_exw" value="0" required readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label">Biaya Lainnya</label>
                            <button class="btn btn-success p-0 px-2 fs-6" id="btn-biaya-lainnya" type="button">+</button>
                        </div>
                        <div id="biaya-lainnya" class="d-flex flex-column gap-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <button class="btn btn-danger m-0 px-3 removeItem" type="button">
                                            <i class="fa fa-xmark"></i>
                                        </button>
                                        <input type="text" class="form-control ps-2" name="nama_biaya_lainnya[]" placeholder="Nama biaya" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 ps-0">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control ps-2 biaya-lainnya count" name="biaya_lainnya[]" placeholder="0" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-end">
                        <label class="form-label mt-2" for="total_biaya_lainnya">Total Biaya Lainnya</label>
                        <div class="input-group bg-light">
                            <span class="input-group-text bg-transparent">Rp</span>
                            <input type="number" class="form-control ps-2 bg-transparent" name="total_biaya_lainnya" id="total_biaya_lainnya" value="0" required readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <label class="form-label fs-6 mb-0 d-block text-end" for="diskon">Diskon</label>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control ps-2 count" name="diskon" id="diskon" value="0" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <label class="form-label fs-6 mb-0 d-block text-end" for="total">Total</label>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group bg-light">
                            <span class="input-group-text bg-transparent">Rp</span>
                            <input type="number" class="form-control ps-2 bg-transparent" name="total" id="total" value="0" required readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <label class="form-label fs-6 mb-0 d-block text-end" for="harga_all_in">Harga All In / kg</label>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group bg-light">
                            <span class="input-group-text bg-transparent">Rp</span>
                            <input type="number" class="form-control ps-2 bg-transparent" name="harga_all_in" id="harga_all_in" value="0" required readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary" onclick="return confirm(message)">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= BASEURL ?>/js/custom/shipment.js"></script>

<script>
    let message = 'Apakah anda yakin ingin menambah data?';

    $(function() {
        const BASEURL = window.location.href;

        $('.tombolTambahData').on('click', function() {
            message = 'Apakah anda yakin ingin menambah data?';

            $('modalLabel').html('Tambah Data')
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $(".modal-body form").attr("action", `${BASEURL}/insert`);
            $(".modal-body form")[0].reset();
            $("#stok_id").prop('readonly', false);
            $("#pesan").prop('readonly', false);

            biayaLainnya.innerHTML = `
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <button class="btn btn-danger m-0 px-3 removeItem" type="button">
                                <i class="fa fa-xmark"></i>
                            </button>
                            <input type="text" class="form-control ps-2" name="nama_biaya_lainnya[]" placeholder="Nama biaya" required>
                        </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control ps-2 biaya-lainnya count" name="biaya_lainnya[]" placeholder="0" min="0" required>
                        </div>
                    </div>
                </div>
            `;

            refreshEvent();
        });

        $(".tampilModalUbah").click(function() {
            message = 'Apakah anda yakin ingin mengubah data?';
            const id = $(this).data("id");

            $("#modal").addClass("edit");
            $("#modalLabel").html("Ubah Data");
            $(".modal-footer button[type=submit]").html("Ubah Data");
            $(".modal-body form").attr("action", `${BASEURL}/update/${id}`);
            $("#stok_id").prop('readonly', true);
            $("#pesan").prop('readonly', true);

            $.ajax({
                url: `${BASEURL}/getubah/${id}`,
                method: "get",
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $("#stok_id").val(data.stok_id);
                    $("#tanggal").val(data.tanggal);
                    $("#no_akuntansi").val(data.no_akuntansi);
                    $("#supplier_id").val(data.supplier_id);
                    $("#deskripsi").val(data.deskripsi);
                    $("#pesan").val(data.pesan);

                    satuan.value = Array.from(document.getElementById('barang').options)
                        .map(opt => {return {nama: opt.value, satuan: opt.dataset.satuan}})
                        .find(item => item.nama === data.stok_id)
                        .satuan;

                    $("#berat").val(data.berat);
                    $("#harga_exw").val(data.harga_exw);
                    $("#total_exw").val(data.total_exw);

                    let biaya_lainnya = JSON.parse(data.biaya_lainnya);
                    biayaLainnya.innerHTML = '';

                    for (let key in biaya_lainnya)  {
                        let biaya = document.createElement('div');
                        biaya.setAttribute('class', 'row');
                        biaya.innerHTML = `
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <button class="btn btn-danger m-0 px-3 removeItem" type="button">
                                        <i class="fa fa-xmark"></i>
                                    </button>
                                    <input type="text" class="form-control ps-2" name="nama_biaya_lainnya[]" placeholder="Nama biaya" value=${key} required>
                                </div>
                            </div>
                            <div class="col-sm-6 ps-0">
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control ps-2 biaya-lainnya count" name="biaya_lainnya[]" value=${biaya_lainnya[key]} placeholder="0" min="0" required>
                                </div>
                            </div>
                        `;
                        biayaLainnya.appendChild(biaya);
                    }

                    $("#total_biaya_lainnya").val(data.total_biaya_lainnya);
                    $("#diskon").val(data.diskon);
                    $("#total").val(data.total);
                    $("#harga_all_in").val(data.harga_all_in);

                    refreshEvent();
                },
            });
        });
    });
</script>

<?php Get::view('templates/footer', $data) ?>