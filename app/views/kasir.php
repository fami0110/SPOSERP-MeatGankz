<?php if ($data['user']): ?>
    <?php require_once "templates/header.php" ?>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
        </div> -->
        <div class="container">
            <!-- <h3>Cari Produk</h3>
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
            </div> -->
            <!-- <h4>Cari Produk Dengan Code..</h4>
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
            </div> -->
            <!-- <div class="row">
                Tombol dengan panjang yang sama
                <div class="col-md-12 mt-3">
                    <a href="<?= BASEURL; ?>/customer" class="btn btn-success"style="width: 100%">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Customer
                    </a>
                </div>
            </div> -->
        </div>

        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <a href="#">
                        <button class="card custom-card addProductSale p-0" style="width: 100%">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Gambar Produk">
                            <div class="card-body">
                                <h7 class="card-title">Sayur</h7>
                                <p class="text-secondary text-start m-0">20</p>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="col-lg-4 mb-5">
                    <a href="#">
                        <button class="card custom-card addProductSale p-0" style="width: 100%">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Gambar Produk">
                            <div class="card-body">
                                <h7 class="card-title">Daging</h7>
                                <p class="text-secondary text-start m-0">20</p>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="col-lg-4 mb-5">
                    <a href="#">
                        <button class="card custom-card addProductSale p-0" style="width: 100%">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Gambar Produk">
                            <div class="card-body">
                                <h7 class="card-title">Buah</h7>
                                <p class="text-secondary text-start m-0">20</p>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="col-lg-4 mb-5">
                    <a href="#">
                        <button class="card custom-card addProductSale p-0" style="width: 100%">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Gambar Produk">
                            <div class="card-body">
                                <h7 class="card-title">Steak</h7>
                                <p class="text-secondary text-start m-0">20</p>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-user ps-2"></i>
                            </span>
                            <input type="text" class="form-control ps-2" value="admin" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-key ps-2"></i>
                            </span>
                            <input type="text" class="form-control ps-2" value="10001" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-users ps-2"></i>
                            </span>
                            <input type="text" class="form-control ps-2" value="Customer">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <button class="btn btn-danger m-0 removeProduct" type="button" id="button-addon1">
                                        <i class="fa fa-xmark"></i>
                                    </button>
                                    <input type="text" class="form-control ps-3" value="Steak" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 ps-0">
                                <input type="number" class="form-control ps-2" value="1" name="" id="">
                            </div>
                            <div class="col-lg-4 ps-0">
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">Rp. </span>
                                    <input type="text" class="form-control ps-2" value="20.000" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="idTransaksi" class="col-lg-12 col-form-label">Pajak</label>
                                    <input type="number" class="form-control" name="" id="" value="0">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="idTransaksi" class="col-lg-12 col-form-label">Total</label>
                                    <div class="input-group mb-3">
                                        <span class="input input-group-text" id="button-addon1">Rp. </span>
                                        <input type="text" class="form-control ps-2" value="20.000" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="" class="col-lg-12 col-form-label">Pembayaran</label>
                                    <select name="" id="pembayaran" class="form-control">
                                        <option value="pembayaran" selected>Pembayaran</option>
                                        <option value="cash">Cash</option>
                                        <option value="debit">Debit</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4" id="bayar" style="display: none;">
                            <label for="" class="col-lg-12 col-form-label">Bayar</label>
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">Rp. </span>
                                    <input type="text" class="form-control ps-2" value="20.000">
                                </div>
                            </div>
                            <div class="col-lg-4" id="kembalian" style="display: none;">
                            <label for="" class="col-lg-12 col-form-label">Kembalian</label>
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">Rp. </span>
                                    <input type="text" class="form-control ps-2" value="20.000" readonly>
                                </div>
                            </div>
                            <div class="col-lg-8" id="kode_transaksi" style="display: none;">
                            <label for="" class="col-lg-12 col-form-label">Kode Transaksi</label>
                                <div class="input-group mb-3">
                                    <span class="input input-group-text" id="button-addon1">
                                        <i class="fa fa-lock ps-2"></i>
                                    </span>
                                    <input type="text" class="form-control ps-2" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <!-- <a href="" class="btn btn-info me-2 mb-0">
                                    <i class="fa fa-print me-2"></i>
                                    Print
                                </a> -->
                                <a href="" class="btn btn-primary mb-0">
                                    <i class="fa fa-save me-2"></i>
                                    Simpan
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myCalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Customer baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="bi bi-x-circle"></i></button>
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
        </div>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="<?= BASEURL; ?>/js/datatables.js"></script>
        <script>
            const paymentMethodSelect = document.getElementById('pembayaran');
            const bayarDiv = document.getElementById('bayar');
            const kembalianDiv = document.getElementById('kembalian');
            const DebitDiv = document.getElementById('kode_transaksi');

            paymentMethodSelect.addEventListener('change', function() {
                if (paymentMethodSelect.value === 'cash') {
                    bayarDiv.style.display = 'block';
                    kembalianDiv.style.display = 'block';
                    DebitDiv.style.display = 'none'; // Sembunyikan DebitDiv jika "cash" dipilih
                } else if (paymentMethodSelect.value === 'debit' || paymentMethodSelect.value === 'kredit') {
                    DebitDiv.style.display = 'block';
                    bayarDiv.style.display = 'none'; // Sembunyikan bayarDiv jika "debit" atau "kredit" dipilih
                    kembalianDiv.style.display = 'none'; // Sembunyikan kembalianDiv jika "debit" atau "kredit" dipilih
                } else {
                    bayarDiv.style.display = 'none';
                    kembalianDiv.style.display = 'none';
                    DebitDiv.style.display = 'none';
                }
            });
        </script>
        <script>
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-basic", {
                searchable: true,
                fixedHeight: true
            });
        </script>
        <script>
            $(function () {
                const BASEURL = window.location.href;
                console.log(BASEURL)
                $('.tombolTambahData').on('click', function () {
                    $('modalLabel').html('Tambah Data')
                    $('.modal-footer button[type=submit]').html('Tambah Data');

                });

                $(".tampilModalUbah").click(function () {
                    $("#modal").addClass("edit");
                    $("#modalLabel").html("Ubah Data");
                    $(".modal-footer button[type=submit]").html("Ubah Data");
                    $(".modal-body form").attr("action", `${BASEURL}/update`);

                    const id = $(this).data("id");
                    console.log(id);

                    $.ajax({
                        url: `${BASEURL}/getubah`,
                        data: {
                            id: id
                        },
                        method: "post",
                        dataType: "json",
                        success: function (data) {
                            $('#nama').val(data.nama);
                            $("#alamat").val(data.alamat);
                            $('#kontak').val(data.kontak);
                            $('#email').val(data.email);
                            $('#id').val(data.id);
                            console.log(data);
                        },
                    })
                })
            });
        </script>
        <?php require_once "templates/footer.php" ?>
    <?php else: ?>
        <link id="pagestyle" href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet" />
        <link id="pagestyle" href="<?= BASEURL; ?>/css/soft-ui-dashboard.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link href="<?= BASEURL; ?>/css/nucleo-icons.css" rel="stylesheet" />
        <link href="<?= BASEURL; ?>/css/nucleo-svg.css" rel="stylesheet" />
        <main class="main-content  mt-0">
            <div>
                <section class="min-vh-100 d-flex align-items-center">
                    <div class="container">
                        <div class="row mt-lg-0 mt-8">
                            <div class="col-lg-5 my-auto">
                                <h1 class="display-1 text-bolder text-gradient text-warning fadeIn1 fadeInBottom mt-5">
                                    Error 403
                                </h1>
                                <h2 class="fadeIn3 fadeInBottom opacity-8">Forbidden</h2>
                                <p class="lead opacity-6 fadeIn2 fadeInBottom">The page you're looking are forbidden
                                </p>
                                <a href="<?= BASEURL; ?>login"
                                    class="btn bg-gradient-warning mt-4 fadeIn2 fadeInBottom">Login</a>
                            </div>
                            <div class="col-lg-7 my-auto">
                                <img class="w-100 fadeIn1 fadeInBottom"
                                    src="<?= BASEURL; ?>/img/illustrations/error-500.png" alt="500-error">
                            </div>
                        </div>
                </section>
            </div>
        </main>
    <?php endif; ?>
</div>