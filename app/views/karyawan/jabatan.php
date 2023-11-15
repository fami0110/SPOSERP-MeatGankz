<?php Get::view('templates/header', $data) ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title">Jabatan</h5>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <button class="btn bg-gradient-primary d-lg-block" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive p-0">
                    <table class="table table-bordered align-items-center" style="width: 100%" id="table">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Jabatan</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Keterangan</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data["jabatan"] as $jabatan): ?>
                            <tr>
                                <td>
                                    <p class="text-sm text-center font-weight-bold mb-0">
                                        <?= $i++; ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="text-sm text-center font-weight-bold mb-0">
                                        <?= $jabatan["nama"] ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="text-sm text-center font-weight-bold mb-0">
                                        Rp <?= number_format($jabatan['gaji'], 0, '.', '.') ?>
                                    </p>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-id="<?= $jabatan['id']; ?>" class="btn bg-gradient-primary mb-0 tampilModalUbah rounded-pill">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="" onclick="return confirm ('Hapus data?')" class="btn bg-gradient-dark mb-0 rounded-pill">
                                        <i class="fa fa-trash"></i>
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
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/jabatan/insert" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gaji</label>
                        <input type="number" class="form-control" name="gaji" id="gaji">
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
            $(".modal-body form").attr("action", `${BASEURL}/insert`);
            $(".modal-body form")[0].reset();
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
                data: {id: id},
                method: "post",
                dataType: "json",
                success: function (data) {
                    $('#nama').val(data.nama);
                    $("#gaji").val(data.gaji);
                },
            })
        })
    });
</script>

<?php Get::view('templates/footer', $data) ?>