<?php Get::view('templates/header', $data) ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- Filter -->
<div class="container-fluid py-4">
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
              <button type="button" class="btn bg-gradient-primary mb-0"><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
            </div>
            <div class="col-md-4 pb-0 mt-5 d-flex flex-column align-items-end">

              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
</div>
<!-- End Filter -->

<!-- Tabel -->
<div class="container-fluid" id="dataDetailAbsen">
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6">
              <h5 class="card-title">Kelola Stok</h5>
            </div>
            <div class="col-lg-6 d-flex justify-content-end flex-column">
              <div class="row d-flex justify-content-end">
                <div class="col-lg-6">
                  <a href="<?= BASEURL; ?>/pemasukan" class="btn bg-gradient-primary d-lg-block" type="button">
                    Barang Masuk
                  </a>
                </div>
                <div class="col-lg-6">
                  <a href="<?= BASEURL; ?>/laporanPengeluaran" class="btn bg-gradient-info d-lg-block" type="button">
                    Barang Keluar
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class=" card-body px-0 pt-0 pb-3">

          <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse;">
              <thead>
                <tr align="center">
                  <th rowspan="3" class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7 align-middle">Barang</th>
                  <?php
                  $dates = array_column($data["pemasukan"], 'tanggal');
                  $uniqueDates = array_unique($dates);
                  sort($uniqueDates);
                  ?>
                  <?php foreach ($uniqueDates as $date) : ?>
                    <th colspan="3" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                      <?= $date; ?>
                    </th>
                  <?php endforeach; ?>
                </tr>
                <tr>
                  <?php foreach ($uniqueDates as $date) : ?>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                      Masuk
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                      Stok
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                      Keluar
                    </th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <?php $prevBarangId = null; ?>
                <?php foreach ($data["stok"] as $stok) : ?>
                  <?php if ($stok['barang_id'] !== $prevBarangId) : ?>
                    <tr>
                      <td>
                        <p class="text-sm text-center font-weight-bold mb-0">
                          <?php
                          $dbarang = '-';

                          foreach ($data['barang'] as $barang) {
                            if ($barang['id'] == $stok['barang_id']) {
                              $dbarang = $barang['nama'];
                              break;
                            }
                          }

                          echo $dbarang;
                          ?>
                        </p>
                      </td>
                      <?php $prevBarangId = $stok['barang_id']; ?>
                      <?php foreach ($uniqueDates as $date) : ?>
                        <?php $dateData = array_filter($data["stok"], function ($item) use ($date, $stok) {
                          return $item['tanggal'] == $date;
                        }); ?>
                        <?php if (count($dateData) > 0) : ?>
                          <?php foreach ($dateData as $dateItem) : ?>
                            <td class="align-middle text-center text-sm">
                              <p class="text-sm font-weight-bold mb-0">
                                <?= number_format($dateItem['pesan'], 0, '.', '.'), ' ', $dateItem['unit_pesan']; ?>
                              </p>
                            </td>
                            <td class="align-middle text-center">
                              <p class="text-sm font-weight-bold mb-0">
                                <?= $dateItem['stok']; ?>
                              </p>
                            </td>
                            <td class="align-middle text-center">
                              <p class="text-sm font-weight-bold mb-0">
                                <?= $dateItem['keluar']; ?>
                              </p>
                            </td>
                          <?php endforeach; ?>
                        <?php else : ?>
                          <td class="align-middle text-center text-sm">
                            <p class="text-sm font-weight-bold mb-0">-</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-sm font-weight-bold mb-0">-</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-sm font-weight-bold mb-0">-</p>
                          </td>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
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
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              <?php foreach ($data['barang'] as $barang) : ?>
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
          $('#barang_id').val(data.barang_id);
          $("#tanggal").val(data.tanggal);
          $('#masuk').val(data.masuk);
          $('#stok').val(data.stok);
          $('#keluar').val(data.keluar);
          $('#id').val(data.id);
          console.log(data);
        },
      });
    });
  });
</script>

<?php Get::view('templates/footer', $data) ?>