<?php Get::view('templates/header', $data) ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title">Daftar Barang</h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <button class="btn bg-gradient-primary mb-0 d-lg-block tombolTambahData" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 search" id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Stok</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Satuan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data["barang"] as $barang) : ?>
                                <tr>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $barang['nama']; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $barang['stok'] ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $barang['satuan'] ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn bg-gradient-primary rounded-pill mb-0 tampilModalUbah"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                            data-id="<?= $barang['id']; ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <a href="<?= BASEURL ?>/stok/delete/<?= $barang['id'] ?>" onclick="return confirm('Hapus data?')" class="btn bg-gradient-dark rounded-pill mb-0">
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
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/stok/insert" method="post">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="stok" class="form-label">Jumlah Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok" required>
                    </div>
                    <div class="col-md-6">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select class="form-select" name="satuan" id="satuan" required>
                            <option value="Kg">Kg</option>
                            <option value="pcs">pcs</option>
                            <option value="Pack">Pack</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="riwayat" id="riwayat" value="">
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL; ?>/js/datatables.js"></script>
<script>
    $(function() {
        const BASEURL = window.location.href;
        $('.tombolTambahData').on('click', function() {
            $('modalLabel').html('Tambah Data')
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $(".modal-body form").attr("action", `${BASEURL}/insert`);
            $(".modal-body form")[0].reset();

            $('#stok').val(0);
        });

        $(".tampilModalUbah").click(function() {
            $("#modal").addClass("edit");
            $("#modalLabel").html("Ubah Data");
            $(".modal-footer button[type=submit]").html("Ubah Data");
            $(".modal-body form").attr("action", `${BASEURL}/update`);

            const id = $(this).data("id");

            $.ajax({
                url: `${BASEURL}/getubah`,
                data: {id: id},
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id)
                    $('#nama').val(data.nama)
                    $('#stok').val(data.stok)
                    $('#satuan').val(data.satuan)
                    $('#riwayat').val(data.riwayat)
                },
            })
        })
    });
</script>

<?php Get::view('templates/footer', $data) ?>