<?php Get::view('templates/header', $data) ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="card-title">Pesanan</h5>
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
                                    Nama Pelanggan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nomor Telp</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Detail Pesanan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data["pembayaran"] as $pembayaran) : ?>
                                <tr>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $pembayaran['pelanggan']; ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= $pembayaran['nomor_telp']; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn bg-gradient-info rounded-pill tampilModalUbah m-0" 
                                            data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                            data-id="<?= $pembayaran['id']; ?>">
                                            <i class="bi bi-search"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if (!$pembayaran['status_order']) : ?>
                                            <a class="btn btn-success rounded-pill m-0" href="<?= BASEURL ?>/pesanan/updateStatusPesanan/<?= $pembayaran['id'] ?>" 
                                                onclick="return confirm(`Apakah anda yakin ingin mengubah status pesanan?`)">
                                                Pending
                                            </a>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-secondary rounded-pill m-0">
                                                Selesai
                                            </button>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-sm text-center font-weight-bold mb-0">
                                        <?= date('d/m/Y  H.m', strtotime($pembayaran['created_at'])) ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a class="btn bg-gradient-dark rounded-pill m-0" 
                                            href="<?= BASEURL; ?>/pesanan/delete/<?= $pembayaran['id'] ?>" 
                                            onclick="return confirm ('Hapus data?')">
                                            <i class="bi bi-trash"></i>
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

<!-- modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Detail Pesanan</h1>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center fw-bold">Nama</th>
                            <th class="text-center fw-bold">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= BASEURL; ?>/js/datatables.js"></script>
<script>
    $(function() {
        const BASEURL = window.location.href;
        console.log(BASEURL);

        $(".tampilModalUbah").click(function() {
            const id = $(this).data("id");

            $.ajax({
                url: `${BASEURL}/getubah`,
                data: {id: id},
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('.modal-body table tbody').html('');
                    for (let row of data) {
                        $('.modal-body table tbody').append(`
                            <tr>
                                <td>${row.item}</td>
                                <td>${row.amount}</td>
                            </tr>`
                        );
                    }
                },
            })
        })
    });
</script>

<?php Get::view('templates/footer', $data) ?>