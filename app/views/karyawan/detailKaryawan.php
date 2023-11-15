<?php Get::view('templates/header', $data) ?>

<style>
    .profile {
        object-fit: cover;
        height: 80px;
        width: 80px;
    }
    img[data-bs-toggle="modal"]:hover {
        filter: brightness(0.7);
        cursor: pointer;
    }

    .overlay {
        position: relative;
        display: none;
    }

    .overlay i {
        position: absolute;
        top: 50%;
        right: 20%;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        /* Adjust the size as needed */
        color: #ffffff75;
        /* Set the color of the icon */
    }

    img[data-bs-toggle="modal"]:hover+.overlay {
        display: block;
    }

    img[data-bs-toggle="modal"]:hover+.overlay i {
        display: block;
    }

    .btn-close {
        --bs-btn-close-color: #000;
        --bs-btn-close-bg: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e);
        --bs-btn-close-opacity: 0.5;
        --bs-btn-close-hover-opacity: 0.75;
        --bs-btn-close-focus-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        --bs-btn-close-focus-opacity: 1;
        --bs-btn-close-disabled-opacity: 0.25;
        --bs-btn-close-white-filter: invert(1) grayscale(100%) brightness(200%);
        box-sizing: content-box;
        width: 1em;
        height: 1em;
        padding: 0.25em 0.25em;
        color: var(--bs-btn-close-color);
        background: transparent var(--bs-btn-close-bg) center/1em auto no-repeat;
        border: 0;
        border-radius: 0.375rem;
        opacity: var(--bs-btn-close-opacity);
    }
</style>
<div class="page-header min-height-300 border-radius-xl mt-4"
    style="background-image: url('<?= BASEURL ?>/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
</div>
<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="<?= BASEURL ?>/img/datafoto/<?= $data['Managekaryawan']['foto'] ?>" alt="profile_image" class="border-radius-lg shadow-sm profile"
                    draggable="false" data-bs-toggle="modal" data-bs-target="#imageModal">
                <div class="overlay" data-bs-toggle="modal" data-bs-target="#imageModal">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    <?= $data['Managekaryawan']['nama'] ?>
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    <?= $data['Managekaryawan']['jabatan'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Hero -->

<!-- Modal Lihat Foto -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFotoTitle">Foto Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= BASEURL ?>/img/datafoto/<?= $data['Managekaryawan']['foto'] ?>" alt="Foto Karyawan" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- End Modal Foto -->

<!-- Card -->
<div class="container-fluid py-4 fade show" id="attendance-card">
    <div class="card mb-4 ">
        <div class="card-body">

            <div class="card-body">
                <div class="card-header p-0">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Informasi Karyawan</h6>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">

                    <div class="col-md-6">
                        <hr class="horizontal gray-light mb-4 mt-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                    class="text-dark">NIK:</strong>
                                &nbsp; <?= $data['Managekaryawan']['nik'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama:</strong>
                                &nbsp;
                                <?= $data['Managekaryawan']['nama'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat
                                    Lahir:</strong>
                                &nbsp; <?= $data['Managekaryawan']['tempat_lahir'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tanggal
                                    Lahir:</strong>
                                &nbsp; <?= $data['Managekaryawan']['tgllahir'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jenis
                                    Kelamin:</strong>
                                &nbsp; <?= $data['Managekaryawan']['jenis_kelamin'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong>
                                &nbsp;
                                <?= $data['Managekaryawan']['alamat'] ?></li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <hr class="horizontal gray-light mb-4 mt-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                                &nbsp; <?= $data['Managekaryawan']['email'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor
                                    Telepon:</strong>
                                &nbsp;
                                <?= $data['Managekaryawan']['no_telp'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Jabatan:</strong>
                                &nbsp; <?= $data['Managekaryawan']['jabatan'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong>
                                &nbsp; <?= $data['Managekaryawan']['statuss'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gaji:</strong>
                                &nbsp; Rp <?= number_format($data['Managekaryawan']['gaji'], 0, '.', '.') ?></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    <a href="<?= BASEURL ?>/Managekaryawan" class="btn btn-secondary mb-0">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Card -->

<div style="clear: both;"></div>
<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                    for a better web.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                            Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                            target="_blank">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                            target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Modal Edit Karyawan -->
<div class="modal fade" id="modalEditKaryawan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Managekaryawan/insert" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="fotoLama" id="fotoLama">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="nik">NIK</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Cth: 2021010024001"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="nama_karyawan">Nama</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Cth: Tono"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                placeholder="Cth: Kota Malang" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="tgllahir" id="tgllahir" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" name="jenis_kelamin"
                                    id="jenis_kelamin" value="Laki-laki" />
                                <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" name="jenis_kelamin"
                                    id="jenis_kelamin" value="Perempuan" />
                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="alamat_karyawan">Alamat</label>
                        </div>
                        <div class="col-md-10">
                            <textarea class="form-control" name="alamat" id="alamat"
                                placeholder="Cth: Jl. Terusan Sulfat 25A, Pandanwangi, Kecamatan Blimbing, Kota Malang, Jawa Timur"
                                required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Cth: tono@gmail.com" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="no_telp">Nomor Telepon</label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control ps-2 border-start" aria-label="Nomor Telepon"
                                id="no_telp" name="no_telp" aria-describedby="no_telp" value="0812345678910">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="foto_karyawan">Foto</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="foto" id="foto" accept=".jpg, .png, .pdf">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="jabatan_karyawan">Jabatan</label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-select" name="jabatan" id="jabatan" aria-label="Jabatan Karyawan"
                                required>
                                <option selected disabled>Pilih Jabatan</option>
                                <option value="manager">Manager</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="status_karyawan">Status</label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-select" name="statuss" id="statuss" aria-label="Status Karyawan"
                                required>
                                <option selected disabled>Pilih Status</option>
                                <option value="Tetap">Karyawan Tetap</option>
                                <option value="Honorer">Karyawan Honorer</option>
                                <option value="Kontrak">Karyawan Kontrak</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="gaji_karyawan">Gaji</label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="gaji" id="gaji" required />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-dark mb-1" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn bg-gradient-primary mb-1">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>


<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL; ?>/js/datatables.js"></script> -->
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
            $("#modalLabel").html("Ubah Data Karyawan");
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
                    $('#nik').val(data.nik);
                    $('#nama').val(data.nama);
                    $("#alamat").val(data.alamat);
                    $('#no_telp').val(data.no_telp);
                    $('#email').val(data.email);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tgllahir').val(data.tgllahir);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#jabatan').val(data.jabatan);
                    $('#statuss').val(data.statuss);
                    $('#gaji').val(data.gaji);
                    $('#fotoLama').val(data.foto);
                    $('#id').val(data.id);
                    console.log(data);
                },
            })
        })
    });
</script>

<?php Get::view('templates/footer', $data) ?>