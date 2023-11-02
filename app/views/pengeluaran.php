<?php if ($data['user']): ?>

<?php require_once "templates/header.php" ?>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<!-- Filter -->
<!-- <div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 ">
        <div class="card-body mb-3">
          <form class="row g-3 align-middle">
            <div class="col-md-3">
              <label for="from_date" class="form-label">From</label>
              <input type="text" name="from_date" value="2023-10-19" class="datepicker form-control" id="from_date" />
            </div>
            <div class="col-md-3">
              <label for="to_date" class="form-label">To</label>
              <input type="text" name="to_date" value="2023-10-19" class="datepicker form-control" id="to_date" />
            </div>
            <div class="col-md-2 pb-0 mt-5 d-flex flex-column">
              <button type="button" class="btn bg-gradient-primary mb-0"><i class="fa fa-search-plus"
                  aria-hidden="true"></i> Search</button>
            </div>
            <div class="col-md-4 pb-0 mt-5 d-flex flex-column align-items-end">

              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <button type="button" class="btn bg-gradient-dark mb-0">Export Laporan</button>
                </a>
                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1" id="printBtn">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1"><i class="fa fa-print me-1"></i>Print </h6>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1" id="exportBtn">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold"><i class="fa fa-print me-1"></i>Excel</span>
                          </h6>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- End Filter -->



<!-- Tabel -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-8">
              <h5 class="card-title">Data Pengeluaran</h5>
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
        <div class=" card-body px-0 pt-0 pb-3">

          <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse;">
              <thead>
                <tr align="center">
                  <th rowspan="3" class="align-middle">Barang</th>
                  <?php
                  $dates = array_column($data["pemasukan"], 'tanggal');
                  $uniqueDates = array_unique($dates);
                  sort($uniqueDates);
                  ?>
                  <?php foreach ($uniqueDates as $date): ?>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                      <?= $date; ?>
                    </th>
                  <?php endforeach; ?>
                </tr>
                <tr>
                  <?php foreach ($uniqueDates as $date): ?>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                      Keluar
                    </th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data["barang"] as $barang): ?>
                  <tr>
                    <td>
                      <p class="text-sm text-center font-weight-bold mb-0">
                        <?= $barang['nama']; ?>
                      </p>
                    </td>
                    <?php foreach ($uniqueDates as $date): ?>
                      <?php foreach ($data['pemasukan'] as $pemasukan): ?>
                        <?php $dateData = array_filter($data["pemasukan"], function ($item) use ($date, $pemasukan) {
                          return $item['tanggal'] == $date;
                        }); ?>
                        <?php if (count($dateData) > 0): ?>
                          <?php foreach ($dateData as $dateItem): ?>
                            <td class="align-middle text-center text-sm">
                              <p class="text-sm font-weight-bold mb-0">
                                <?= number_format($dateItem['berat'], 0, '.', '.'), ' ', $dateItem['unit_berat']; ?>
                              </p>
                            </td>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <td class="align-middle text-center text-sm">
                            <p class="text-sm font-weight-bold mb-0">-</p>
                          </td>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
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
<!-- End Tabel -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/kelolaStok/insert" method="post">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Barang</label>
            <select class="form-control" name="barang_id" id="barang_id">
              <?php foreach ($data['barang'] as $barang): ?>
                <option value="<?= $barang['id']; ?>">
                  <?= $barang['nama']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masuk</label>
            <input type="number" class="form-control" name="masuk" id="masuk">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" id="stok">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Keluar</label>
            <input type="number" class="form-control" name="keluar" id="keluar">
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

</div>
</div>
</div>

<div style="clear: both;"></div>

</div>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
<script>
  new DataTable('.table', {
    fixedColumns: {
      left: 1,
      right: 0
    },
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 300
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
      $("#modalLabel").html("Ubah Data");
      $(".modal-footer button[type=submit]").html("Ubah Data");
      $(".modal-body form").attr("action", ${ BASEURL } / update);

      const id = $(this).data("id");
      console.log(id);

      $.ajax({
        url: ${ BASEURL } / getubah,
        data: {
        id: id
      },
        method: "post",
        dataType: "json",
        success: function (data) {
          $('#barang_id').val(data.barang_id);
          $("#tanggal").val(data.tanggal);
          $('#masuk').val(data.masuk);
          $('#stok').val(data.stok);
          $('#keluar').val(data.keluar);
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
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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