<?php Get::view('templates/header', $data) ?>

<?php 
  $range = (strtotime($data['filter']['to']) - strtotime($data['filter']['from'])) / (60 * 60 * 24);
?>

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
        <div class="card-body px-0 pt-0 pb-3">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr align="center">
                  <th rowspan="3" class="align-middle">Nama</th>
                  <th rowspan="3" class="align-middle">Satuan</th>
                  <?php for ($i = 0; $i <= $range; $i++) : ?>
                    <th colspan="3"><?= date('d/m/Y', strtotime($data['filter']['from']) + ($i * 60 * 60 * 24)) ?></th>
                  <?php endfor; ?>
                </tr>
                <tr>
                  <?php for ($i = 0; $i <= $range; $i++) : ?>
                    <th>Masuk</th>
                    <th>Stok</th>
                    <th>Keluar</th>
                  <?php endfor; ?>
                </tr>
              </thead>

              <tbody>
                <?php $lastVal = 0; ?>
                <?php foreach ($data['barang'] as $barang) : ?>
                  <tr align="center">
                    <td><?= $barang['nama'] ?></td>
                    <td><?= $barang['satuan'] ?></td>
                    <?php $riwayat = json_decode($barang['riwayat'], true) ?>
                    <?php for ($i = 0; $i <= $range; $i++) : ?>
                      <?php $key = date('Y-m-d', strtotime($data['filter']['from']) + ($i * 60 * 60 * 24)) ?>
                      <?php if (array_key_exists($key, $riwayat)) : ?>
                        <td><?= $riwayat[$key]['masuk'] ?></td>
                        <td><?= $riwayat[$key]['stok'] ?></td>
                        <td><?= $riwayat[$key]['keluar'] ?></td>
                        <?php $lastVal = $riwayat[$key]['stok'] ?>
                      <?php else : ?>
                        <td>0</td>
                        <td><?= $lastVal ?></td>
                        <td>0</td>
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

<script src="<?= BASEURL ?>/js/custom/rekap-stok.js"></script>

<?php Get::view('templates/footer', $data) ?>