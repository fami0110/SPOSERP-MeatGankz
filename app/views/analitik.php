<?php if ($data['user']): ?>
    <?php require_once "templates/header.php" ?>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pendapatan</p>
                                <h5 class="font-weight-bolder mb-0">
                                    Rp <?= number_format($data['pendapatan']['total_pembayaran'], 0, '.', '.')  ?>
                                    <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Supplier</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $data['jmlSupplier'] ?>
                                    <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Produk</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $data['jmlMenu'] ?>
                                    <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Karyawan</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $data['jmlKaryawan'] ?>
                                    <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 col-md-12">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Traffic channels</h6>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-md badge-dot me-4">
                            <i class="bg-primary"></i>
                            <span class="text-dark text-xs">Organic search</span>
                        </span>
                        <span class="badge badge-md badge-dot me-4">
                            <i class="bg-dark"></i>
                            <span class="text-dark text-xs">Referral</span>
                        </span>
                        <span class="badge badge-md badge-dot me-4">
                            <i class="bg-info"></i>
                            <span class="text-dark text-xs">Social media</span>
                        </span>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Referrals</h6>
                        <button type="button"
                            class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="See which websites are sending traffic to your website">
                            <i class="fas fa-info"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-5 col-12 text-center">
                            <div class="chart mt-5">
                                <canvas id="chart-doughnut" class="chart-canvas" height="200"></canvas>
                            </div>
                            <a class="btn btn-sm bg-gradient-secondary mt-4">See all referrals</a>
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../assets/img/small-logos/logo-xd.svg"
                                                            class="avatar avatar-sm me-2" alt="logo_xd">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Adobe</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> 25% </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../assets/img/small-logos/logo-atlassian.svg"
                                                            class="avatar avatar-sm me-2" alt="logo_atlassian">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Atlassian</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> 3% </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../assets/img/small-logos/logo-slack.svg"
                                                            class="avatar avatar-sm me-2" alt="logo_slack">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Slack</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> 12% </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../assets/img/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm me-2" alt="logo_spotify">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Spotify</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> 7% </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../assets/img/small-logos/logo-jira.svg"
                                                            class="avatar avatar-sm me-2" alt="logo_jira">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Jira</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> 10% </span>
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
    </div>
    <div class="row mt-4">
        <div class="col-sm-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Social</h6>
                        <button type="button"
                            class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="See how much traffic do you get from social media">
                            <i class="fas fa-info"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="w-100">
                                <div class="d-flex align-items-center mb-2">
                                    <a class="btn btn-facebook btn-simple mb-0 p-0" href="javascript:;">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <span class="me-2 text-sm font-weight-bold text-capitalize ms-2">Facebook</span>
                                    <span class="ms-auto text-sm font-weight-bold">80%</span>
                                </div>
                                <div>
                                    <div class="progress progress-md">
                                        <div class="progress-bar bg-gradient-dark w-80" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="w-100">
                                <div class="d-flex align-items-center mb-2">
                                    <a class="btn btn-twitter btn-simple mb-0 p-0" href="javascript:;">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <span class="me-2 text-sm font-weight-bold text-capitalize ms-2">Twitter</span>
                                    <span class="ms-auto text-sm font-weight-bold">40%</span>
                                </div>
                                <div>
                                    <div class="progress progress-md">
                                        <div class="progress-bar bg-gradient-dark w-40" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="w-100">
                                <div class="d-flex align-items-center mb-2">
                                    <a class="btn btn-reddit btn-simple mb-0 p-0" href="javascript:;">
                                        <i class="fab fa-reddit fa-lg"></i>
                                    </a>
                                    <span class="me-2 text-sm font-weight-bold text-capitalize ms-2">Reddit</span>
                                    <span class="ms-auto text-sm font-weight-bold">30%</span>
                                </div>
                                <div>
                                    <div class="progress progress-md">
                                        <div class="progress-bar bg-gradient-dark w-30" role="progressbar"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="w-100">
                                <div class="d-flex align-items-center mb-2">
                                    <a class="btn btn-youtube btn-simple mb-0 p-0" href="javascript:;">
                                        <i class="fab fa-youtube fa-lg"></i>
                                    </a>
                                    <span class="me-2 text-sm font-weight-bold text-capitalize ms-2">Youtube</span>
                                    <span class="ms-auto text-sm font-weight-bold">25%</span>
                                </div>
                                <div>
                                    <div class="progress progress-md">
                                        <div class="progress-bar bg-gradient-dark w-25" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="w-100">
                                <div class="d-flex align-items-center mb-2">
                                    <a class="btn btn-slack btn-simple mb-0 p-0" href="javascript:;">
                                        <i class="fab fa-slack fa-lg"></i>
                                    </a>
                                    <span class="me-2 text-sm font-weight-bold text-capitalize ms-2">Slack</span>
                                    <span class="ms-auto text-sm font-weight-bold">15%</span>
                                </div>
                                <div>
                                    <div class="progress progress-md">
                                        <div class="progress-bar bg-gradient-dark w-15" role="progressbar"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card h-100 mt-4 mt-md-0">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex align-items-center">
                        <h6>Pages</h6>
                        <button type="button"
                            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Data is based from sessions and is 100% accurate">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body px-3 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Page</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Page Views</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Avg. Time</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Bounce Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">1. /bits</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">345</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:17:07</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">40.91%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">2. /pages/argon-dashboard</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">520</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:23:13</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">30.14%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">3. /pages/soft-ui-dashboard</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">122</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:3:10</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">54.10%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">4. /bootstrap-themes</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">1,900</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:30:42</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">20.93%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">5. /react-themes</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">1,442</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:31:50</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">34.98%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">6. /product/argon-dashboard-angular</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">201</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:12:42</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">21.4%</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">7. /product/material-dashboard-pro</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">2,115</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">00:50:11</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">34.98%</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "templates/footer.php" ?>
<?php else: ?>
    <link id="pagestyle" href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet" />
    <link id="pagestyle" href="<?= BASEURL; ?>/css/soft-ui-dashboard.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="<?= BASEURL; ?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= BASEURL; ?>/css/nucleo-svg.css" rel="stylesheet" />
    <main class="main-content  mt-0">
        <div>
            <section class="min-vh-100 d-flex align-items-center">
                <div class="container">
                    <div class="row mt-lg-0 mt-8">
                        <div class="col-lg-5 my-auto">
                            <h1 class="display-1 text-bolder text-gradient text-warning fadeIn1 fadeInBottom mt-5">
                                Error 403
                            </h1>
                            <h2 class="fadeIn3 fadeInBottom opacity-8">Forbidden</h2>
                            <p class="lead opacity-6 fadeIn2 fadeInBottom">The page you're looking are forbidden
                            </p>
                            <a href="<?= BASEURL; ?>login"
                                class="btn bg-gradient-warning mt-4 fadeIn2 fadeInBottom">Login</a>
                        </div>
                        <div class="col-lg-7 my-auto">
                            <img class="w-100 fadeIn1 fadeInBottom" src="<?= BASEURL; ?>/img/illustrations/error-500.png"
                                alt="500-error">
                        </div>
                    </div>
            </section>
        </div>
    </main>
<?php endif; ?>
</div>