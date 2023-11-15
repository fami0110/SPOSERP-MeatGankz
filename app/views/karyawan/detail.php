<?php Get::view('templates/header', $data) ?>

<?php
foreach ($data['jabatan'] as $item) {
    $jabatan[$item['id']] = $item['nama'];
}
?>

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
<div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= BASEURL ?>/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
</div>
<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="<?= BASEURL ?>/img/datafoto/<?= $data['karyawan']['foto'] ?>" alt="profile_image" class="border-radius-lg shadow-sm profile" draggable="false" data-bs-toggle="modal" data-bs-target="#imageModal">
                <div class="overlay" data-bs-toggle="modal" data-bs-target="#imageModal">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    <?= $data['karyawan']['nama'] ?>
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    <?= $jabatan[$data['karyawan']['jabatan_id']] ?>
                </p>
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
                <img src="<?= BASEURL ?>/img/datafoto/<?= $data['karyawan']['foto'] ?>" alt="Foto Karyawan" class="img-fluid">
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
                            <h5 class="mb-0">Informasi Karyawan</h5>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">

                    <div class="col-md-6">
                        <hr class="horizontal gray-light mb-4 mt-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">NIK:</strong>
                                &nbsp; <?= $data['karyawan']['nik'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nama:</strong>
                                &nbsp;
                                <?= $data['karyawan']['nama'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat
                                    Lahir:</strong>
                                &nbsp; <?= $data['karyawan']['tempat_lahir'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tanggal
                                    Lahir:</strong>
                                &nbsp; <?= $data['karyawan']['tgllahir'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jenis
                                    Kelamin:</strong>
                                &nbsp; <?= $data['karyawan']['jenis_kelamin'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong>
                                &nbsp;
                                <?= $data['karyawan']['alamat'] ?></li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <hr class="horizontal gray-light mb-4 mt-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                                &nbsp; <?= $data['karyawan']['email'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor
                                    Telepon:</strong>
                                &nbsp;
                                <?= $data['karyawan']['no_telp'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jabatan:</strong>
                                &nbsp; <?= $jabatan[$data['karyawan']['jabatan_id']] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong>
                                &nbsp; <?= $data['karyawan']['status_karyawan'] ?></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gaji:</strong>
                                &nbsp; Rp <?= number_format($data['karyawan']['gaji'], 0, '.', '.') ?></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row flex-row-reverse">
                <div class="col-auto">
                    <a href="<?= BASEURL ?>/karyawan" class="btn btn-secondary me-3 mb-3">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Card -->

<?php Get::view('templates/footer', $data) ?>