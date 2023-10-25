<?php if ($data['user']): ?>
    <?php require_once "templates/header.php" ?>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="card-title">Menu</h6>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex justify-content-end">
                                <button class="btn bg-gradient-primary d-lg-block" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                        Tambah Data Menu
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" card-body px-0 pt-0 pb-3">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0" id="datatable-search">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        No</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Nama Menu</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Foto</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Stok</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Bahan</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                                        <td>
                                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                                <?= $menu['nama']; ?>
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <img src="<?= BASEURL?>/img/datafoto/<?=$menu['foto']?>" alt="img" <?=$menu['foto']?>" style="max-width: 150px; max-height: 10%" >
                                                        </td>
                                                        <td>
                                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                                <?= $menu['jumlah']; ?>
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="text-sm font-weight-bold mb-0">
                                                                <?= $menu['bahan']; ?>
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a href="<?= BASEURL;?>/menu/update/<?=$menu['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                data-id="<?= $menu['id']; ?>"
                                                                class="btn btn-primary tampilModalUbah">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                            <a href="<?= BASEURL; ?>/menu/delete/<?= $menu['id'] ?>"
                                                                onclick="return confirm ('Hapus data?')" class="btn btn-dark">
                                                                <i class="bi bi-trash"></i>


                                                            <!-- <td><img src="<?= BASEURL ?>/img/datafoto<?= $menu['foto'] ?>" ></td> -->

                                                            
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
                <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                                <button type="button" class="btn btn-dark mb-0" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-xmark"></i>
                                </button>
                            </div>
                        
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/menu/insert" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Menu</label>
                                        <input type="text" class="form-control" name="nama" id="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Upload Foto</label>
                                        <input type="file" class="form-control" name="foto" id="foto" accept=".png, .jpg, .jpeg, .gif" required>
                                    </div>
                                    
                                        <input type="hidden" class="form-control" name="fotolama" id="fotolama" accept=".png, .jpg, .jpeg, .gif" required>
                                    
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Bahan</label>
                                        <input type="text" class="form-control" name="bahan" id="bahan">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="<?= BASEURL; ?>/js/datatables.js"></script>
                <script>
                    const dataTableSearch = new simpleDatatables.DataTable("#datatable-basic", {
                        searchable: true,
                        fixedHeight: true
                    });
                </script>
                <script>
                    $(function() {
                        const BASEURL = window.location.href;
                        console.log(BASEURL)
                        $('.tombolTambahData').on('click', function() {
                        $('modalLabel').html('Tambah Data')
                        $('.modal-footer button[type=submit]').html('Tambah Data');

                        });

                        $(".tampilModalUbah").click(function() {
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
                            success: function(data) {
                            $('#nama').val(data.nama);
                            $("#jumlah").val(data.jumlah);
                            $('#bahan').val(data.bahan);
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
                                        <h1
                                            class="display-1 text-bolder text-gradient text-warning fadeIn1 fadeInBottom mt-5">
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