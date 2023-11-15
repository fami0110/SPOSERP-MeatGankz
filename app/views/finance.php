<?php if ($data['user']): ?>
    <?php require_once "templates/header.php" ?>

    <style>
        .badge.copy-badge {
            background-color: #5bc0de;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .badge.copy-badge:hover {
            background-color: #2a6496;
            color: #000;
        }
    </style>

    <div class="row mb-2">
        <div class="col-lg-8">
            <h1>Finance</h1>
        </div>
        <div class="col-lg-4 align-middle">
            <div class="row align-middle">
                <div class="col-lg-6 text-end pe-0">
                    <button class="btn bg-gradient-primary dropdown-toggle mb-0" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pilih Tahun
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">2021</a></li>
                        <li><a class="dropdown-item" href="#">2022</a></li>
                        <li><a class="dropdown-item" href="#">2023</a></li>
                        <li><a class="dropdown-item" href="#">2024</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-end ps-0">
                    <button class="btn bg-gradient-primary dropdown-toggle mb-0" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pilih Kuartal
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Kuartal 1</a></li>
                        <li><a class="dropdown-item" href="#">Kuartal 2</a></li>
                        <li><a class="dropdown-item" href="#">Kuartal 3</a></li>
                        <li><a class="dropdown-item" href="#">Kuartal 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pemasukan</p>
                                <h5 class="font-weight-bolder mb-0">
                                    Rp.53.000.00
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengeluaran</p>
                                <h5 class="font-weight-bolder mb-0">
                                    Rp.23.000.00
                                    <span class="text-danger text-sm font-weight-bolder">-23%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-7">
                            <h4 class="mb-0">2023-Kuartal 1 ( Januari - Maret )</h4>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">2 data</span> Diterima
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 text-lg-end text-start">
                            <button type="button" id="tambahDataBtn" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-3">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-sm" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NO</th>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Code</th>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi</th>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Bulan</th>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Debit</th>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kredit</th>
                                    <th
                                        class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">1</td>
                                    <td class=" align-middle text-sm text-center font-weight-bold mb-0">
                                        <a class="badge bg-gradient-success copy-badge" data-clipboard-text="MSK289099290">
                                            MSK289099290
                                            <i class="bi bi-bookmark-x-fill"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">Sakit</td>
                                    <td class=" align-middle text-sm text-center font-weight-bold mb-0">Maret</td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">RP 20.000.000</td>
                                    <td class=" align-middle text-sm text-center font-weight-bold mb-0">-</td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">RP 20.000.000</td>
                                </tr>
                                <tr>
                                    <td class=" align-middle text-sm text-center font-weight-bold mb-0">2</td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">
                                        <a class="badge bg-gradient-info copy-badge" data-clipboard-text="MSK289099290">
                                            MSK289099290
                                            <i class="bi bi-bookmark-x-fill"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">Mati</td>
                                    <td class=" align-middle text-sm text-center font-weight-bold mb-0">Maret</td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">-</td>
                                    <td class=" align-middle text-sm text-center font-weight-bold mb-0">RP 15.000.000</td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">RP 5.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="code" class="col-form-label col">Code</label>
                            <div class="col">
                                <input type="code" class="form-control" id="code" placeholder="MSK99000303003" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-form-label col">Kategori</label>
                            <div class="col">
                                <input type="text" class="form-control" id="kategori" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-form-label col">Deskripsir</label>
                            <div class="col">
                                <input type="text" class="form-control" id="deskripsi" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nominal" class="col-form-label col">Nominal / Jumlah</label>
                            <div class="col">
                                <input type="number" class="form-control" id="nominal" placeholder="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var clipboard = new ClipboardJS('.copy-badge');

            clipboard.on('success', function (e) {
                e.clearSelection();
                alert('Teks berhasil disalin!');
            });

            clipboard.on('error', function (e) {
                console.error('Gagal menyalin teks', e);
            });
        });
    </script>

    <?php require_once "templates/footer.php" ?>
<?php else: ?>
<?php endif; ?>