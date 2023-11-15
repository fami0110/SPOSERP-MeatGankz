<?php Get::view('templates/header', $data) ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title mb-0">Manage Karyawan</h5>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-end">
                        <button class="btn bg-gradient-primary d-lg-block mb-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalEditKaryawan">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-sm text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gaji</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($data["karyawan"] as $karyawan): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $i++ ?></td>
                                    <td class="text-center align-middle">
                                        <img src="<?= BASEURL; ?>/img/datafoto/<?= $karyawan['foto'] ?>" class="avatar" style="object-fit: cover"
                                            alt="foto_karyawan_1">
                                    </td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0"><?= $karyawan['nama'] ?></td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0"><?= $karyawan['jabatan'] ?></td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0"><?= $karyawan['statuss'] ?></td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0"><?= $karyawan['email'] ?></td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">Rp <?= number_format($karyawan['gaji'], 0, '.', '.') ?></td>
                                    <td class="align-middle text-sm text-center font-weight-bold mb-0">
                                        <button class="btn bg-gradient-primary rounded-pill mb-0 btn-icon tampilModalUbah"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit"
                                            data-bs-toggle="modal" data-bs-target="#modalEditKaryawan" data-id="<?= $karyawan['id']; ?>"><i
                                                class="fa fa-pen"></i></button>
                                        <a class="btn btn-danger rounded-pill mb-0 btn-icon delete-button" href="<?= BASEURL; ?>/Managekaryawan/delete/<?= $karyawan['id'] ?>"
                                            onclick="return confirm ('Hapus data?')"
                                            data-toggle="tooltip" data-placement="bottom" title="Hapus"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="<?= BASEURL; ?>/Managekaryawan/detail/<?= $karyawan['id'] ?>" data-id="<?= $karyawan['id']; ?>" class="btn btn-info rounded-pill mb-0 btn-icon"
                                            data-toggle="tooltip" data-placement="bottom" title="Detail">
                                            <i class="fa fa-user"></i>
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
</div>
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
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Cth: 2021010024001" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="nama_karyawan">Nama</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Cth: Tono" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Cth: Kota Malang" required />
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
                                <input class="form-check-input jenis_kelamin" type="radio" name="jenis_kelamin" value="Laki-laki" />
                                <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input jenis_kelamin" type="radio" name="jenis_kelamin" value="Perempuan" />
                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="alamat_karyawan">Alamat</label>
                        </div>
                        <div class="col-md-10">
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Cth: Jl. Terusan Sulfat 25A, Pandanwangi, Kecamatan Blimbing, Kota Malang, Jawa Timur" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="no_telp">Nomor Telepon</label>
                        </div>
                        <div class="col-md-10">
                            <input type="number" class="form-control ps-2 border-start" aria-label="Nomor Telepon"
                                id="no_telp" name="no_telp" aria-describedby="no_telp" placeholder="08xxx">
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
                        <select class="form-select" name="jabatan" id="jabatan" aria-label="Jabatan Karyawan" required>
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
                        <select class="form-select" name="statuss" id="statuss" aria-label="Status Karyawan" required>
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
                            <input type="number" class="form-control" name="gaji" id="gaji" placeholder="Rp" required />
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

<script>
    $(function () {
        const BASEURL = window.location.href;
        console.log(BASEURL)
        $('.tombolTambahData').on('click', function () {
            $('modalLabel').html('Tambah Data')
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $(".modal-body form").attr("action", `${BASEURL}/insert`);
            $(".modal-body form")[0].reset();
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
                    $(`.jenis_kelamin[value=${data.jenis_kelamin}]`).prop('checked', true);
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