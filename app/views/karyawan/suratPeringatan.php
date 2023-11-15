<?php Get::view('templates/header', $data) ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4 ">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title">Surat Peringatan</h5>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-end">
                        <button type="button" class="mb-0 btn bg-gradient-primary tombolTambahData" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah Data</button>
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
            

            <div class="card-body">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0" style="width: 100%" id="table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kategori SP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Karyawan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jabatan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kesalahan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Sanksi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['surat'] as $surat): ?>
                                    <tr>
                                        <td class="align-middle">
                                            <p class="text-sm text-center font-weight-bold mb-0 text-wrap">
                                                <?php 
                                                    $kategori = '-';
                                                    
                                                    foreach ($data['kategori'] as $kategoriSP) {
                                                        if ($kategoriSP['id'] == $surat['kategori']) {
                                                            $kategori = $kategoriSP['nama']; break;
                                                        }   
                                                    }

                                                    echo $kategori;
                                                ?>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 align-middle">
                                                <div class="d-flex flex-column justify-content-center align-middle">
                                                    <h6 class="mb-0 text-sm">
                                                        <?php 
                                                            $kategori = '-';
                                                            
                                                            foreach ($data['Managekaryawan'] as $karyawan) {
                                                                if ($karyawan['id'] == $surat['nama']) {
                                                                    $kategori = $karyawan['nama']; break;
                                                                }   
                                                            }

                                                            echo $kategori;
                                                        ?>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <?= $surat['email'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm text-center font-weight-bold mb-0 text-wrap">
                                                <?= $surat['jabatan'] ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm text-center font-weight-bold mb-0 text-wrap">
                                                <?= $surat['kesalahan'] ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-sm text-center font-weight-bold mb-0 text-wrap">
                                                <?= $surat['sanksi'] ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-end text-sm">
                                            <a href="<?= BASEURL; ?>/Suratperingatan/print/<?= $surat['id'] ?>"
                                                class="btn bg-gradient-success rounded-pill mb-0">
                                                <i class="bi bi-printer-fill me-1"></i>
                                            </a>
                                            <button type="button" class="btn bg-gradient-warning tampilModalUbah rounded-pill mb-0"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-id='<?= $surat['id'] ?>'>
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <a href="<?= BASEURL; ?>/Suratperingatan/hapus/<?= $surat['id'] ?>"
                                                class="btn bg-gradient-danger rounded-pill mb-0"><i class="fa fa-trash"
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
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Suratperingatan/tambah" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="username">Kategori Surat Peringatan</label>
                            <select class="form-select" name="kategori" id="kategori">
                                <option value=1>--Pilih Kategori SP--</option>
                                <?php foreach ($data['kategori'] as $kategori): ?>
                                    <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username">Nama Karyawan:</label>
                            <div class="input-group">
                                <select class="form-select" id="nama" placeholder="Tambah Nama Karyawan..." name="nama">
                                    <option value="">--Pilih Karyawan--</option>
                                    <?php foreach ($data['Managekaryawan'] as $karyawan): ?>
                                        <option value="<?= $karyawan['id'] ?>" data-email="<?= $karyawan['email'] ?>" data-jabatan="<?= $karyawan['jabatan'] ?>" data-alamat="<?= $karyawan['alamat'] ?>"><?= $karyawan['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="email" placeholder="Tambah Nama Email..."
                                    name="email" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan">Jabatan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="jabatan" placeholder="Tambah Jabatan..."
                                    name="jabatan" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="jabatan">Alamat</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="alamat" placeholder="Tambah Alamat..."
                                    name="alamat" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Kesalahan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="kesalahan" placeholder=" Tambah Kesalahan..."
                                    name="kesalahan">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Sanksi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="sanksi" placeholder=" Tambah Sanksi..."
                                    name="sanksi">
                            </div>
                        </div>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?= BASEURL; ?>/js/datatables.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#nama').change(function () {
            // Get the selected employee's information
            var selectedEmployee = $(this).find(':selected');
            var selectedEmail = selectedEmployee.data('email');
            var selectedJabatan = selectedEmployee.data('jabatan');
            var selectedAlamat = selectedEmployee.data('alamat');

            // Set the values for Email, Jabatan, and Alamat
            $('#email').val(selectedEmail);
            $('#jabatan').val(selectedJabatan);
            $('#alamat').val(selectedAlamat);
        });
    });
</script>

<script>
    $(function () {
        const BASEURL = window.location.href;
        $('.tombolTambahData').on('click', function () {

            $('#exampleModalLabel').html('Tambah Data');
            $('.modal-body form').attr('action', `${BASEURL}/tambah`);
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
            $('.modal-body form').attr('action', `${BASEURL}/ubah`);

            const id = $(this).data('id');

            $.ajax({
                url: `${BASEURL}/getubah`,
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

<?php Get::view('templates/footer', $data) ?>