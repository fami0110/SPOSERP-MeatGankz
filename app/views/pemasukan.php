<?php if ($data['user']): ?>
    <?php require_once "templates/header.php" ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="card-title">Pemasukan</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex justify-content-end">
                                <button class="btn bg-gradient-primary d-lg-block" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Data Pemasukan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-3">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0" id="datatable-search">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Deskripsi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pesan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Berat</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga /unit (exw)</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total (exw)</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ongkir</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ice Pack</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Diskon</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Supplier</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data["pemasukan"] as $pemasukan): ?>
                                    <tr>
                                        <td>
                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                <?= $i++; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                <?= 'Rp. ', $pemasukan['harga'], '/', $pemasukan['unit_harga']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                <?= $pemasukan['deskripsi']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['pesan'], $pemasukan['unit_pesan']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['berat'], $pemasukan['unit_berat']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['harga_exw']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['total_exw']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['ongkir']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['ice_pack']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['diskon']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['total']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?= $pemasukan['keterangan']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="<?= BASEURL; ?>/pemasukan/update/<?= $pemasukan['id'] ?>"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-id="<?= $pemasukan['id']; ?>" class="btn bg-gradient-primary tampilModalUbah">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= BASEURL; ?>/pemasukan/delete/<?= $pemasukan['id'] ?>"
                                                onclick="return confirm ('yakin?')" class="btn bg-gradient-dark acc-button">
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
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/pemasukan/insert" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="harga" id="harga">
                                        </div>
                                        <div class="col-lg-3">
                                            <select class="form-select" name="unit_harga" id="unit_harga">
                                                <option value="Kg">Kg</option>
                                                <option value="Pack">Pack</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pesan</label>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="pesan" id="pesan">
                                        </div>
                                        <div class="col-lg-3">
                                            <select class="form-select" name="unit_pesan" id="unit_pesan">
                                                <option value="Kg">Kg</option>
                                                <option value="Pcs">Pcs</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Berat</label>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" name="berat" id="berat">
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" name="unit_berat" id="unit_berat" value="gr"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Harga /unit (exw)</label>
                                    <input type="text" class="form-control" name="harga_exw" id="harga_exw">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Total (exw)</label>
                                    <input type="text" class="form-control" name="total_exw" id="total_exw" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Ongkir</label>
                                    <input type="text" class="form-control" name="ongkir" id="ongkir">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Ice Pack</label>
                                    <input type="text" class="form-control" name="ice_pack" id="ice_pack">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Diskon</label>
                                    <input type="text" class="form-control" name="diskon" id="diskon">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total" id="total" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                                    <select class="form-select" name="keterangan" id="keterangan">
                                        <?php foreach ($data['supplier'] as $supplier): ?>
                                        <option value="1"><?= $supplier['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
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
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL; ?>/js/datatables.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const acceptButtons = document.querySelectorAll(".acc-button");
        acceptButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            Swal.fire({
            title: "Apakah Anda Yakin?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3136b9",
            cancelButtonColor: "#9a9de4",
            confirmButtonText: "Ya, Saya Yakin",
            cancelButtonText: "Batal",
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Data berhasil diterima.",
                showConfirmButton: false,
                timer: 1200,
                });
            }
            });
        });
        });

        const rejectButtons = document.querySelectorAll(".reject-button");
        rejectButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data ini akan terhapus.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e6381a",
            cancelButtonColor: "#9a9de4",
            confirmButtonText: "Ya, Saya Yakin",
            cancelButtonText: "Batal",
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text:"Data berhasil ditolak.",
                showConfirmButton: false,
                timer: 1200,
                });
            }
            });
        });
        });
    });
    </script>
    <script>
        var hargaExwInput = document.getElementById('harga_exw');
        var pesanInput = document.getElementById('pesan');
        var totalExwInput = document.getElementById('total_exw');
        var ongkirInput = document.getElementById('ongkir');
        var icePackInput = document.getElementById('ice_pack');
        var diskonInput = document.getElementById('diskon');
        var totalInput = document.getElementById('total');

        ongkirInput.addEventListener('input', updateTotal);
        icePackInput.addEventListener('input', updateTotal);
        diskonInput.addEventListener('input', updateTotal);

        function updateTotal() {
            var hargaExwValue = parseFloat(hargaExwInput.value) || 0;
            var pesanValue = parseInt(pesanInput.value) || 0;
            var ongkirValue = parseFloat(ongkirInput.value) || 0;
            var icePackValue = parseFloat(icePackInput.value) || 0;
            var diskonValue = parseFloat(diskonInput.value) || 0;

            var totalExw = hargaExwValue * pesanValue;
            var total = totalExw + ongkirValue + icePackValue - diskonValue;

            totalExwInput.value = totalExw;
            totalInput.value = total;
        }


        hargaExwInput.addEventListener('input', updateTotalExw);
        pesanInput.addEventListener('input', updateTotalExw);

        function updateTotalExw() {
            var hargaExwValue = parseFloat(hargaExwInput.value) || 0; 
            var pesanValue = parseInt(pesanInput.value) || 0; 
            var totalExw = hargaExwValue * pesanValue;
            totalExwInput.value = totalExw;
        }
    </script>
    <script>
        const dataTableSearch = new simpleDatatables.DataTable(".table", {
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
                        $('#harga').val(data.harga);
                        $('#unit_harga').val(data.unit_harga);
                        $('#menu').val(data.menu);
                        $('#pesan').val(data.pesan);
                        $('#unit_pesan').val(data.unit_pesan);
                        $('#berat').val(data.berat);
                        $('#unit_benar').val(data.unit_benar);
                        $('#harga_exw').val(data.harga_exw);
                        $('#total_exw').val(data.total_exw);
                        $('#ongkir').val(data.ongkir);
                        $('#ice_pack').val(data.ice_pack);
                        $('#diskon').val(data.diskon);
                        $('#total').val(data.total);
                        $('#keterangan').val(data.keterangan);
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
                            <img class="w-100 fadeIn1 fadeInBottom" src="<?= BASEURL; ?>/img/illustrations/error-500.png"
                                alt="500-error">
                        </div>
                    </div>
            </section>
        </div>
    </main>
<?php endif; ?>
</div>