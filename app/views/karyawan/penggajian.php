<?php Get::view('templates/header', $data) ?>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-body mb-3">
        <form class="row g-3 align-middle">
          <div class="col-md-3">
            <label for="month" class="form-label">Bulan</label>
            <select class="form-select" name="month" id="month" aria-label="Default select example">
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="year" class="form-label">Tahun</label>
            <select class="form-select" name="year" id="year" aria-label="Default select example">
            </select>
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
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="panel-title">
            <div class="row">
              <div class="col-md-10">
                <h6 class="text-secondary">Penggajian Bulan : <span class="fw-bold text-uppercase">xxx</span></h6>
              </div>
              <div class="col-md-2 text-end">
                <h6> <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalGaji">Tambah Data</button></h6>
              </div>
            </div>
          </div>
          <div class="row">
            <table id="table" class="table table-sm table-bordered text-nowrap" style="width:100%">
              <thead>
                <tr>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder">No.</th>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Pengawai</th>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Surat Peringatan</th>
                  <th colspan="5" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gaji</th>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gaji Total</th>
                  <th rowspan="2" class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                </tr>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pokok</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tunjangan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Upah Lembur</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bonus</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Potongan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">1</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">123456789</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Raib Permata</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Pustakawan</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">-</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Rp. 10.000.000</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Rp. 10.000.000</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Rp. 10.000.000</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Rp. 10.000.000</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">-</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">Rp. 40.000.000</td>
                  <td class="align-middle text-sm text-center font-weight-bold mb-0 px-3">
                    <button class="btn bg-gradient-primary rounded-pill btn-icon mb-0" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pen"></i></button>
                    <button class="btn btn-danger rounded-pill btn-icon mb-0 delete-button" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></button>
                    <button class="btn bg-gradient-dark rounded-pill btn-icon mb-0" data-toggle="tooltip" data-placement="bottom" title="Print Slip Gaji" data-bs-toggle="modal" data-bs-target="#modalSlipGaji"><i class="fa fa-print"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Tabel -->

<!-- Modal Gaji -->
<!-- <div class="modal fade" id="modalGaji" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGajititle">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="nomorPegawai">Nomor Pegawai</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control ps-2 border-start" placeholder="Contoh : 009012932"
                aria-label="nomorPegawai" id="nomorPegawai" name="nomorPegawai" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="namaPegawai">Nama Pegawai</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control ps-2 border-start" placeholder="Contoh : Raib Permata"
                aria-label="namaPegawai" id="namaPegawai" name="namaPegawai" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="jabatanPegawai">Jabatan Pegawai</label>
            </div>
            <div class="col-md-10">
              <select class="form-select" aria-label="jabatanPegawai" id="jabatanPegawai" name="jabatanPegawai">
                <option selected disabled>Pilih Jabatan</option>
                <option value="A">Jabatan A</option>
                <option value="B">Jabatan B</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="suratPeringatan">Jumlah Surat Peringatan </label>
            </div>
            <div class="col-md-10">
              <input type="number" class="form-control ps-2 border-start" placeholder="0"
                aria-label="suratPeringatan" id="suratPeringatan" name="suratPeringatan"
                aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="border-top mb-3"></div>
          <div class="row">
            <div class="col-md-2">
              <label class="form-label" for="gajiPokok">Gaji Pokok </label>
            </div>
            <div class="col-md-10">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="0" aria-label="gajiPokok"
                  id="gajiPokok" name="gajiPokok" aria-describedby="basic-addon1" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-3">
              <label for="gajiTunjangan">Tunjangan</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="200.000 (Input angka saja)"
                  aria-label="gajiTunjangan" id="gajiTunjangan" name="gajiTunjangan"
                  aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="gajiLembur">Upah Lembur</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="200.000 (Input angka saja)"
                  aria-label="gajiLembur" id="gajiLembur" name="gajiLembur" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="gajiBonus">Bonus</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="200.000 (Input angka saja)"
                  aria-label="gajiBonus" id="gajiBonus" name="gajiBonus" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="gajiPotongan">Potongan</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="0"
                  aria-label="gajiPotongan" id="gajiPotongan" name="gajiPotongan" aria-describedby="basic-addon1"
                  readonly>
              </div>
            </div>
          </div>
          <div class="border-top mb-3"></div>
          <div class="row">
            <div class="col-md-2">
              <label class="form-label" for="gajiTotal">Gaji Total </label>
            </div>
            <div class="col-md-10">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="0" aria-label="gajiTotal"
                  id="gajiTotal" name="gajiTotal" aria-describedby="basic-addon1" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn bg-gradient-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div> -->
<!-- End Modal -->

<!-- Modal Gaji -->
<div class="modal fade" id="modalGaji" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGajititle">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="nomorPegawai">Nomor Pegawai</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control ps-2 border-start" placeholder="Contoh : 009012932" aria-label="nomorPegawai" id="nomorPegawai" name="nomorPegawai" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="namaPegawai">Nama Pegawai</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control ps-2 border-start" placeholder="Contoh : Raib Permata" aria-label="namaPegawai" id="namaPegawai" name="namaPegawai" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">
              <label class="form-label" for="jabatanPegawai">Jabatan Pegawai</label>
            </div>
            <div class="col-md-10">
              <select class="form-select gaji-input" aria-label="jabatanPegawai" id="jabatanPegawai" name="jabatanPegawai">
                <option selected disabled>Pilih Jabatan</option>
                <option value="A">Jabatan A</option>
                <option value="B">Jabatan B</option>
              </select>
            </div>
          </div>
          <div class="row d-flex justify-content-end mb-3">
            <div class="col-md-2">
              <label class="form-label" for="suratPeringatan">Surat Peringatan </label>
            </div>
            <div class="col-md-10">
              <div class="card border-1 shadow-none rounded-2 mb-2">
                <div class="card-body p-1 px-2">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control ps-2 border-start my-1" placeholder="Surat Peringatan 1" aria-label="suratPeringatan1" id="suratPeringatan1" name="suratPeringatan1" aria-describedby="suratPeringatan1" readonly>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group my-1">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control ps-2 border-start gaji-input" placeholder="0" aria-label="potonganSuratPeringatan1" id="potonganSuratPeringatan1" name="potonganSuratPeringatan1" aria-describedby="potonganSuratPeringatan1">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-10">
              <div class="card border-1 shadow-none rounded-2 mb-2">
                <div class="card-body p-1 px-2">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control ps-2 border-start my-1" placeholder="Surat Peringatan 2" aria-label="suratPeringatan2" id="suratPeringatan2" name="suratPeringatan2" aria-describedby="suratPeringatan2" readonly>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group my-1">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control ps-2 border-start gaji-input" placeholder="0" aria-label="potonganSuratPeringatan2" id="potonganSuratPeringatan2" name="potonganSuratPeringatan2" aria-describedby="potonganSuratPeringatan2">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="border-top mb-3"></div>
          <div class="row">
            <div class="col-md-2">
              <label class="form-label" for="gajiPokok">Gaji Pokok </label>
            </div>
            <div class="col-md-10">
              <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="0" aria-label="gajiPokok" id="gajiPokok" name="gajiPokok" aria-describedby="gajiPokok" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-3">
              <label for="gajiTunjangan">Tunjangan</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start gaji-input" placeholder="200.000 (Input angka saja)" aria-label="gajiTunjangan" id="gajiTunjangan" name="gajiTunjangan" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="gajiLembur">Upah Lembur</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start gaji-input" placeholder="200.000 (Input angka saja)" aria-label="gajiLembur" id="gajiLembur" name="gajiLembur" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="gajiBonus">Bonus</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start gaji-input" placeholder="200.000 (Input angka saja)" aria-label="gajiBonus" id="gajiBonus" name="gajiBonus" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="gajiPotongan">Potongan</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="0" aria-label="gajiPotongan" id="gajiPotongan" name="gajiPotongan" aria-describedby="basic-addon1" readonly>
              </div>
            </div>
          </div>
          <div class="border-top mb-3"></div>
          <div class="row">
            <div class="col-md-2">
              <label class="form-label" for="gajiTotal">Gaji Total </label>
            </div>
            <div class="col-md-10">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
                <input type="number" class="form-control ps-2 border-start" placeholder="0" aria-label="gajiTotal" id="gajiTotal" name="gajiTotal" aria-describedby="basic-addon1" readonly>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn bg-gradient-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Modal Slip Gaji -->
<div class="modal fade" id="modalSlipGaji" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGajititle">Print Slip Gaji</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="card border-1 rounded shadow-none">
            <div class="card-body">
              <div class="container my-5" id="detailData">
                <div class="d-flex justify-content-center">
                  <img src="" alt="logo">
                </div>
                <h5 class="text-uppercase fw-bold text-center mt-2">PT. xxx</h5>

                <div class="border-top mb-3"></div>

                <h5 class="text-center fw-bold text-uppercase mt-2 mb-4">SLIP GAJI KARYAWAN</h5>

                <table class="table table-borderless">
                  <tr>
                    <th style="width: 120px;">Nama</th>
                    <td style="width: 5px;">:</td>
                    <td>Raib Permata</td>
                  </tr>
                  <tr>
                    <th style="width: 120px;">Nomor Pegawai</th>
                    <td style="width: 5px;">:</td>
                    <td>123456789</td>
                  </tr>
                </table>

                <div class="border-top mb-3"></div>

                <table class="table table-bordered">
                  <tr class="table-active">
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                  </tr>
                  <tr>
                    <th>Gaji Pokok</th>
                    <td>Rp. xxx</td>
                  </tr>
                  <tr class="table-active">
                    <td colspan="2">(+)</td>
                  </tr>
                  <tr>
                    <th>Tunjangan</th>
                    <td>Rp. xxx</td>
                  </tr>
                  <tr>
                    <th>Upah Lembur</th>
                    <td>Rp. xxx</td>
                  </tr>
                  <tr>
                    <th>Bonus</th>
                    <td>Rp. xxx</td>
                  </tr>
                  <tr class="table-active">
                    <td colspan="2">(-)</td>
                  </tr>
                  <tr>
                    <th>Potongan</th>
                    <td>Rp. xxx</td>
                  </tr>
                  <tr class="table-active">
                    <td class="text-end">Total :</td>
                    <td>Rp. xxx</td>
                  </tr>
                </table>

                <p class="text-end pt-5 pe-3">Kalimantan, <span id="tanggal"></span> </p>

                <script>
                  const tanggalElement = document.getElementById("tanggal");
                  const options = {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                  };
                  const tanggalString = new Date().toLocaleDateString('id-ID', options); // Ganti 'id-ID' sesuai dengan kode bahasa yang sesuai dengan bahasa Anda
                  tanggalElement.textContent = tanggalString;
                </script>

                <div class="d-flex justify-content-end pe-3">
                  <img src="" alt="ttd">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn bg-gradient-primary" id="printBtn"><i class="fa fa-print me-2"></i>Print</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
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
          $('#nama').val(data.nama);
          $('#pengurangan_gaji').val(data.pengurangan_gaji);
          $('#id').val(data.id);
          console.log(data);
        },
      })
    })
  });
</script>

<?php Get::view('templates/footer', $data) ?>