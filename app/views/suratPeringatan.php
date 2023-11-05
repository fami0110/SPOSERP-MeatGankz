<?php if ($data['user']): ?>
    <?php require_once "templates/header.php" ?>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title">Surat Peringatan</h5>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-end">
                                <button type="button" class=" btn bg-gradient-primary tombolTambahData  "
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
                            </div>
                        </div>
                        <!-- <form action="<?= BASEURL; ?>/Suratperingatan/cari" method="post">
                            <div class="input-container">
                                <div class="input-group">
                                    <span class="input-group-text text-body"><i class="fas fa-search" type="submit"
                                            id="tombolcari" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Cari Karyawan.." name="keyword"
                                        id="keyword" autocomplete="off">
                                </div>
                            </div>
                        </form> -->
                    </div>

                    <div class="card-body p-0">
                        <div class="table-container">
                            <div class="table-responsive">

                                <table class="table align-items-center mb-0" id="datatable-search">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Karyawan</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Jabatan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kesalahan</th>
                                            <th
                                                class="text-end text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Beri
                                                Surat Peringatan
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['surat'] as $data): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <?= $data['nama'] ?>
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <?= $data['email'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        <?= $data['jabatan'] ?>
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">Organization</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        <?= $data['kesalahan'] ?>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-end text-sm">
                                                    <a href="<?= BASEURL; ?>/Suratperingatan/print/<?= $data['id'] ?>"
                                                        class="btn bg-gradient-success">
                                                        <i class="bi bi-printer-fill me-1"></i>
                                                    </a>
                                                    <button type="button" class="btn bg-gradient-warning tampilModalUbah "
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        data-id='<?= $data['id'] ?>'>
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <a href="<?= BASEURL; ?>/Suratperingatan/hapus/<?= $data['id'] ?>"
                                                        class="btn bg-gradient-danger"><i class="fa fa-trash"
                                                            onclick="return confirm('Yakin Mau Hapus?');"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                        <!-- <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                           
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Fauzi</h6>
                              <p class="text-xs text-secondary mb-0">Fauzi123@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Mbecak</p>
                          <p class="text-xs text-secondary mb-0">Organization</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">Maling</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="<?= BASEURL; ?>/Suratperingatan/print" class="badge badge-sm bg-danger"><i class="bi bi-bookmark-x-fill">print</i></a>
                        </td>
                        
                      </tr>
                    -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form action="<?= BASEURL; ?>/Suratperingatan/tambah" method="post">
                            <input type="hidden" name="id" id="id">
                            <label for="username">Nama Karyawan:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nama" placeholder="Tambah Nama Karyawan..."
                                    name="nama">
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="username">Email:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="email" placeholder="Tambah Nama Email..."
                                name="email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan">Jabatan:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="jabatan" placeholder="Tambah Jabatan..."
                                name="jabatan">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan">Alamat:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="alamat" placeholder="Tambah Alamat..."
                                name="alamat">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username">Kesalahan:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kesalahan" placeholder=" Tambah Kesalahan..."
                                name="kesalahan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL; ?>/js/datatables.js"></script>

    <script>

        $(function () {

            $('.tombolTambahData').on('click', function () {

                $('#exampleModalLabel').html('Tambah Data');
                $('.modal-body form').attr('action', 'http://phpmvc.test/Suratperingatan/tambah');
                $('.modal-footer button[type=submit]').html('Tambah Data');
                // $('#nama').val('');
                // $('#email').val('');
                // $('#jabatan').val('');
                // $('#alamat').val('');
                // $('#kesalahan').val('');
                // $('#id').val('');
            });

            $('.tampilModalUbah').on('click', function () {
                // console.log('ok');
                $('#exampleModalLabel').html('Ubah Data');
                $('.modal-footer button[type=submit]').html('Ubah Data');
                $('.modal-body form').attr('action', 'http://phpmvc.test/Suratperingatan/ubah');

                const id = $(this).data('id');

                $.ajax({
                    url: 'http://phpmvc.test/Suratperingatan/getubah',
                    data: { id: id },
                    method: 'post',
                    dataType: 'json',
                    success: function (data) {

                        $('#nama').val(data.nama);
                        $('#email').val(data.email);
                        $('#jabatan').val(data.jabatan);
                        $('#alamat').val(data.alamat);
                        $('#kesalahan').val(data.kesalahan);
                        $('#id').val(data.id);
                        // console.log($data);
                    }
                });
            });

        });
    </script>
    <script>
        const dataTableSearch = new simpleDatatables.DataTable(".table", {
            searchable: true,
            fixedHeight: true
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