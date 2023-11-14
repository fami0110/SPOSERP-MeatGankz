<?php require_once "templates/header.php" ?>
<!-- <link rel="stylesheet" href="<?= BASEURL; ?>/css/invoice.css"> -->
<style>
    page[size="A4"] {
        background: white;
        width: 21cm;
        height: 29.7cm;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        font-size: 12px;
        html, body {
            width: 210mm;
            height: 297mm;
        }
    }

    @media print {
        body {
            size: auto;
            margin: 0;
            box-shadow: 0;
        }

        page[size="A4"] {
            margin: 0;
            size: auto;
            box-shadow: 0;
            color: #000;
        }
        
        page[size="A4"] p {
            font-size: 12px;
        }

        page[size="thermal"] {
            background: white;
            width: 8cm;
            height: fit-content;
            display: flex;
            margin: 0;
            box-shadow: 0;
            font-family: 'Merchant Copy';
        }

        page[size="thermal"] .text-wrap {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            word-wrap: break-word;
            word-break: break-all;
        }

        .page-break {
            display: block;
            page-break-before: always;
        }

        .no-print,
        .no-print * {
            display: none !important;
        }
    }
</style>
<!-- #region -->
<div class="row">
    <div class="col-lg-12">
        <page size="a4" class="card shadow-none" id="printable">
            <div class="card-body">
                <div class="row no-print mb-4">
                    <div class="col-lg-12 text-end">
                        <a href="<?= BASEURL; ?>/suratPeringatan" class="btn bg-gradient-dark mb-0">
                            <strong>
                                <i class="bi bi-chevron-left me-2"></i>
                                Back
                            </strong>
                        </a>
                        <button class="btn bg-gradient-primary mb-0" id="actprint">
                            <i class="bi bi-printer-fill"></i>
                            Print
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <h4><strong>Nama Perusahaan</strong></h4>
                    <p class="mb-0">Alamat Perusahaan: Jl. Contoh No. 123, Kota Contoh</p>
                    <p class="mb-4">Telp: (123) 456-7890</p>
                    <p class="mb-0"><strong>Surat Peringatan</strong></p>
                    <p class="mb-5">No: SP/001/11/2023</p>
                </div>
                <p class="mb-0">Surat ini Ditujukan Kepada:</p>
                <p class="mb-0">
                    Nama:
                        <?php 
                            $kategori = '-';
                            
                            foreach ($data['Managekaryawan'] as $karyawan) {
                                if ($karyawan['id'] == $data['surat']['nama']) {
                                    $kategori = $karyawan['nama']; break;
                                }   
                            }

                            echo $kategori;
                        ?>
                </p>
                <p class="mb-0">
                    Jabatan:
                    <?= $data['surat']['jabatan'] ?>
                </p>
                <p class="mb-3">
                    Alamat:
                    <?= $data['surat']['alamat'] ?>
                </p>
                <p class="mb-3" style="text-align: justify;">
                    Kami ingin menegaskan bahwa tindakan ini melanggar kebijakan perusahaan, yaitu <strong><?= $data['surat']['kesalahan']; ?></strong> dan berpotensi mengakibatkan
                    tindakan disiplin yang lebih lanjut. Kami mengharapkan Anda untuk segera memperbaiki perilaku Anda
                    guna menghindari tindakan lebih lanjut yang mungkin diperlukan. Sesuai dengan peraturan perusahaan yang
                    berlaku, kami akan menerapkan sanksi berupa <strong><?= $data['surat']['sanksi']; ?></strong>. Dengan pemberlakuan sanksi ini, kami berharap agar Saudara
                    <?php 
                            $kategori = '-';
                            
                            foreach ($data['Managekaryawan'] as $karyawan) {
                                if ($karyawan['id'] == $data['surat']['nama']) {
                                    $kategori = $karyawan['nama']; break;
                                }   
                            }

                            echo $kategori;
                        ?>
                    dapat menghindari tindakan yang serupa di masa depan.
                </p>    
                <p class="mb-5">
                    Demikian surat peringatan ini dibuat untuk dijadikan bahan introspeksi. Atas perhatiannya, kami
                    mengucapkan terima kasih.
                </p>
                <p class="mb-0">Malang,
                    <script>
                        const waktuSekarang = new Date();
                        const tanggal = waktuSekarang.getDate();
                        const bulan = waktuSekarang.toLocaleString('default', { month: 'long' });
                        const tahun = waktuSekarang.getFullYear();

                        const hasil = `${tanggal} ${bulan} ${tahun}`;
                        document.write(hasil);
                    </script>
                </p>
                <p class="mb-7">Manajemen Perusahaan,</p>
                <p>Siapa wes</p>
            </div>
        </page>
    </div>
</div>
<script src="<?= BASEURL; ?>/js/jquery-1.10.2.js"></script>

<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        $("#actprint").click(function () {
            window.print();
            return false;
        });
    });
</script>
<?php require_once "templates/footer.php" ?>