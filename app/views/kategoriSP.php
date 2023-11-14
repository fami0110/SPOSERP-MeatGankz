<?php if ($data['user']): ?>

    <?php require_once "templates/header.php" ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-sm-8">
                            <h5 class="card-title">Kategori Surat Peringatan</h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="d-flex justify-content-end">
                                <button class="btn bg-gradient-primary d-lg-block" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Data Kategori
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" card-body pt-0 pb-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="table">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pengurangan Gaji</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data["kategori"] as $kategori): ?>
                                    <tr>
                                        <td>
                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                <?= $i++; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                <?= $kategori['nama']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-center font-weight-bold mb-0">
                                                Rp <?= number_format($kategori['pengurangan_gaji'], 2, ',', '.') ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="<?= BASEURL; ?>/kategori/update/<?= $kategori['id'] ?>"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-id="<?= $kategori['id']; ?>" class="btn bg-gradient-primary rounded-pill tampilModalUbah">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <a href="<?= BASEURL; ?>/kategoriSP/delete/<?= $kategori['id'] ?>"
                                                onclick="return confirm ('Hapus data?')" class="btn bg-gradient-dark rounded-pill">
                                                <i class="fa fa-trash"></i>
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
                    <form action="<?= BASEURL; ?>/kategoriSP/insert" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pengurangan Gaji</label>
                            <input type="number" class="form-control" name="pengurangan_gaji" id="pengurangan_gaji">
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
    <!-- <script src="<?= BASEURL ?>/js/datatables.js"></script> -->
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
                    success: function (data) {
                        $('#nama').val(data.nama);
                        $('#pengurangan_gaji').val(data.pengurangan_gaji);
                        $('#id').val(data.id);
                        console.log(data);
                    },
                })
            })
        });
    </script>

    <?php require_once "templates/footer.php" ?>
<?php else: ?>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
        integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
        crossorigin="anonymous"></script>
    <script>
        var j = jQuery.noConflict(true);

        function Print_Specific_Element() {
            j('#dataDetailAbsen').printThis({
                importCSS: true,
                importStyle: true,
                loadCSS: true,
                canvas: true
            });
        }

        $("#printBtn").click(Print_Specific_Element);
    </script>

    <!-- Tambahkan script jQuery dan jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        function printTable() {
            var printContents = document.getElementById("printableArea").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
        $("#exportBtn").click(function (e) {
            var a = document.createElement('a');

            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('dataDetailAbsen');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            a.href = data_type + ', ' + table_html;
            a.download = 'download.xls';

            a.click();
            e.preventDefault();
        });
    </script>

    <script>
        // Tambahkan event click ke elemen input tanggal
        $(document).ready(function () {
            $("#from_date, #to_date").datepicker({
                dateFormat: "yy-mm-dd", // Format tanggal yang diinginkan (YYYY-MM-DD)
                changeMonth: true,
                changeYear: true
            });
        });
    </script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
<?php endif; ?>