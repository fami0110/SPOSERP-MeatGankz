<!-- Filter -->
<div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4 ">
              <div class="card-body mb-3">
                  <form class="row g-3 align-middle">
                    <div class="col-md-3">
                        <label for="from_date" class="form-label">From</label>
                        <input type="text" name="from_date" value="2023-10-19" class="datepicker form-control" id="from_date"/>
                    </div>
                    <div class="col-md-3">
                        <label for="to_date" class="form-label">To</label>
                        <input type="text" name="to_date" value="2023-10-19" class="datepicker form-control" id="to_date"/>
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
                                    <h6 class="text-sm font-weight-normal mb-1" ><i class="fa fa-print me-1"></i>Print </h6>
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
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-body pb-4 ">
                      <div class="panel-title">
                        <div class="row">
                          <div class="col-md-10">
                          <h6 class="text-secondary">Supplier Ledger</h6>
                          </div>
                          <div class="col-md-2 text-end">
                          <h6> <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button></h6>
                          </div>
                        </div>
                        </div>
                          <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                  <thead>
                                    <tr align="center">
                                        <th rowspan="3" class="align-middle">Deskripsi</th>
                                        <th colspan="3">2023-1-9</th>
                                        <th colspan="3">2023-3-10</th>
                                        <th colspan="3">2023-3-11</th>
                                        <th colspan="3">2023-4-12</th>
                                    </tr>
                                    <tr>
                                        <th>Masuk</th>
                                        <th>Stok</th>
                                        <th>Keluar</th>
                                        <th>Masuk</th>
                                        <th>Stok</th>
                                        <th>Keluar</th>
                                        <th>Masuk</th>
                                        <th>Stokkk</th>
                                        <th>Keluar</th>
                                        <th>Masuk</th>
                                        <th>Stok</th>
                                        <th>Keluar</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <tr align="center">
                                        <td>Daging Giling Regular @1000gr</td>
                                        <td>2.202</td>
                                        <td>2.179</td>
                                        <td>-</td>
                                        <td>20</td>
                                        <td>19</td> 
                                        <td>-</td> 
                                        <td>20</td>
                                        <td>7</td> 
                                        <td>-</td> 
                                        <td>20</td>
                                        <td>7</td> 
                                        <td>-</td> 
                                    </tr>
                                    <tr align="center">
                                        <td>Daging has paha reguler @2000gr</td>
                                        <td>2.202</td>
                                        <td>2.179</td>
                                        <td>-</td>
                                        <td>80</td>
                                        <td>31</td> 
                                        <td>5</td> 
                                        <td>80</td>
                                        <td>31</td> 
                                        <td>5</td> 
                                        <td>80</td>
                                        <td>-</td> 
                                        <td>-</td> 
                                    </tr>
                                    <tr align="center">
                                        <td>Tenderloin Meltique @200gr</td>
                                        <td>2.202</td>
                                        <td>2.179</td>
                                        <td>-</td>
                                        <td>20</td>
                                        <td>19</td> 
                                        <td>-</td> 
                                        <td>20</td>
                                        <td>7</td> 
                                        <td>-</td> 
                                        <td>20</td>
                                        <td>7</td> 
                                        <td>-</td> 
                                    </tr>
                                    <tr align="center">
                                        <td>Iga Regular</td>
                                        <td>2.202</td>
                                        <td>2.179</td>
                                        <td>-</td>
                                        <td>80</td>
                                        <td>31</td> 
                                        <td>5</td> 
                                        <td>80</td>
                                        <td>31</td> 
                                        <td>5</td> 
                                        <td>80</td>
                                        <td>-</td> 
                                        <td>-</td> 
                                    </tr>
                                    <tr align="center">
                                        <td>Tenderloin Meltique @200gr</td>
                                        <td>2.202</td>
                                        <td>2.179</td>
                                        <td>-</td>
                                        <td>20</td>
                                        <td>19</td> 
                                        <td>-</td> 
                                        <td>20</td>
                                        <td>7</td> 
                                        <td>-</td> 
                                        <td>20</td>
                                        <td>7</td> 
                                        <td>-</td> 
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

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="tambahdata">Tambah Data</h5>
              </div>
              <div class="modal-body">
                  <form action="" method="post">
                      <div class="row">
                          <div class="form-group col-md-6">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" placeholder="Contoh: Tenderloin Meltique @200gr" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="hargaUnit">Tanggal</label>
                            <input type="date" class="form-control" id="hargaUnit" placeholder="Contoh: 59,500" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label for="beratJumlah">Masuk</label>
                              <input type="number" class="form-control" id="beratJumlah" placeholder="Contoh: 68" required>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="beratJumlah">Stok</label>
                              <input type="number" class="form-control" id="beratJumlah" placeholder="Contoh: 200" required>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="beratJumlah">Keluar</label>
                              <input type="number" class="form-control" id="beratJumlah" placeholder="Contoh: 9" required>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Batal</button>
                  <button type="button" class="btn bg-gradient-primary">Simpan Perubahan</button>
              </div>
          </div>
      </div>
    </div>

      <div style="clear: both;"></div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>

  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js" integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w==" crossorigin="anonymous"></script>
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
  $("#exportBtn").click(function(e) {
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
      $(document).ready(function() {
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












  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for hboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html> 