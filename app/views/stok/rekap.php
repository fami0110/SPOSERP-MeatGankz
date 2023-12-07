<?php Get::view('templates/header', $data) ?>

<?php 
  $range = (strtotime($data['filter']['to']) - strtotime($data['filter']['from'])) / (60 * 60 * 24);
?>

<style>
    .fixed-column {
      position: -webkit-sticky;
      position: sticky;
      left: 0;
      background-color: white !important;
      z-index: 1; /* Tambahkan z-index agar elemen sticky berada di atas elemen lain */
    }

    
    .table-responsive::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
            background-color: #F5F5F5;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #9e9a9a9a;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            border-radius: 10px;
            background-color: #9e9a9a;
        }
</style>


<!-- Filter -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 ">
        <div class="card-body mb-3">
          <form class="row g-3 align-middle" action="" method="post">
            <div class="col-md-4">
              <label for="from" class="form-label">From</label>
              <input type="date" name="filter[]" value="<?= $data['filter']['from'] ?>" class="datepicker form-control" id="from" />
            </div>
            <div class="col-md-4">
              <label for="to" class="form-label">To</label>
              <input type="date" name="filter[]" value="<?= $data['filter']['to'] ?>" class="datepicker form-control" id="to" />
            </div>
            <div class="col-md-4 pb-0 mt-5 d-flex flex-column">
              <button type="submit" class="btn bg-gradient-primary mb-0"><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
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
          <div class="row mb-3">
            <div class="col-sm-6">
              <h5 class="card-title">Kelola Stok</h5>
            </div>
            <div class="col-sm-6 d-flex flex-column align-items-end">
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
          </div>
        </div>
        <div class="card-body pt-0 px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="table">
              <thead>
                <tr align="center">
                  <th rowspan="3" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder fixed-column">Nama</th>
                  <th rowspan="3" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Saat Ini</th>
                  <th rowspan="3" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                  <?php for ($i = 0; $i <= $range; $i++) : ?>
                    <th colspan="3" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= date('d/m/Y', strtotime($data['filter']['from']) + ($i * 60 * 60 * 24)) ?></th>
                  <?php endfor; ?>
                </tr>
                <tr>
                  <?php for ($i = 0; $i <= $range; $i++) : ?>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Masuk</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keluar</th>
                  <?php endfor; ?>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($data['barang'] as $barang) : ?>
                  <?php $lastVal = 0; ?>
                  <tr align="center">
                    <td class="text-sm text-center font-weight-bold mb-0 fixed-column"><?= $barang['nama'] ?></td>
                    <td class="text-sm text-center font-weight-bold mb-0"><?= $barang['stok'] ?></td>
                    <td class="text-sm text-center font-weight-bold mb-0"><?= $barang['satuan'] ?></td>
                    <?php 
                      $riwayat = json_decode($barang['riwayat'], true);

                      // Add index for each item
                      $i = 0;
                      $found = false;
                      foreach ($riwayat as $key => $val) {
                        $riwayat[$key]['index'] = $i; $i++;
                      }

                      // Get first value of the range
                      for ($i = 0; $i <= $range; $i++) {
                        $key = date('Y-m-d', strtotime($data['filter']['from']) + ($i * 60 * 60 * 24));
                        if (array_key_exists($key, $riwayat)) {
                          $found = true;
                          foreach ($riwayat as $val) {
                            if (($riwayat[$key]['index'] - 1) == $val['index']) {
                              $lastVal = $val['stok'];
                            }
                          }
                          break;
                        }
                      }

                      // Set the lastVal to latest stok value
                      if (!$found) {
                        $lastVal = $barang['stok'];
                      }
                    ?>
                    <?php for ($i = 0; $i <= $range; $i++) : ?>
                      <?php $key = date('Y-m-d', strtotime($data['filter']['from']) + ($i * 60 * 60 * 24)) ?>
                      <?php if (array_key_exists($key, $riwayat)) : ?>
                        <td class="text-sm text-center font-weight-bold mb-0<?= (intval($riwayat[$key]['masuk']) > 0) ? ' text-success' : '' ?>">
                          <?= $riwayat[$key]['masuk'] ?>
                        </td>
                        <td class="text-sm text-center font-weight-bold mb-0"><?= $riwayat[$key]['stok'] ?></td>
                        <td class="text-sm text-center font-weight-bold mb-0<?= (intval($riwayat[$key]['keluar']) > 0) ? ' text-danger' : '' ?>">
                          <?= $riwayat[$key]['keluar'] ?>
                        </td>
                        <?php $lastVal = $riwayat[$key]['stok'] ?>
                      <?php else : ?>
                        <td class="text-sm text-center font-weight-bold mb-0">0</td>
                        <td class="text-sm text-center font-weight-bold mb-0"><?= $lastVal ?></td>
                        <td class="text-sm text-center font-weight-bold mb-0">0</td>
                      <?php endif; ?>
                    <?php endfor; ?>
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

<script src="<?= BASEURL ?>/js/datatables.js"></script>

<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
</script> -->

<script src="<?= BASEURL ?>/js/custom/rekap-stok.js"></script>

<?php Get::view('templates/footer', $data) ?>