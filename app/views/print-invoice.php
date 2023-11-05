<?php require_once "templates/header.php" ?>
<link rel="stylesheet" href="<?= BASEURL; ?>/css/invoice.css">
<style>
    page[size="thermal"] {
        background: white;
        width: 8cm;
        height: fit-content;
        display: block;
        margin: 0;
        margin-bottom: 0.5cm;

        html,
        body {
            /* width: 210mm;
            height: 297mm; */
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
<body>
    <page size="thermal" class="card rounded-0 shadow-none">
        <div class="card-body py-0" style="font-family: 'Merchant Copy';">
            <div id="printable">
                <table width="100%" border="0" cellspacing="0" cellpadding="1">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="lh-sm">
                                    <tr>
                                        <td valign="middle" style="text-align: center">
                                            <img src="<?= BASEURL; ?>/img/logos/meatGenkz.jpg" class="img-fluid" width="40%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" valign="middle" style="text-align: center" class="fs-6">
                                            <center>Nama Toko</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" valign="middle" style="text-align: center">
                                            <center>Jl. jalan</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%" valign="middle" style="text-align: center">
                                            <center>Tlp. 08123333</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start pt-4">
                                            <center>22 Oktober 2023</center>
                                        </td>
                                        <td class="float-end pt-4">
                                            <center>12.01</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Transaksi</center>
                                        </td>
                                        <td class="float-end">
                                            <center>TRX-01</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Kasir</center>
                                        </td>
                                        <td class="float-end">
                                            <center>Masando Lala</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Pelanggan</center>
                                        </td>
                                        <td class="float-end">
                                            <center>Mey Sayang</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>No. WhatsApp</center>
                                        </td>
                                        <td class="float-end">
                                            <center>081233456847</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-2 text-center">
                                            ===============================
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-2 row">
                                            <div class="col-2">
                                                1
                                            </div>
                                            <div class="col-6">
                                                Steak Ayam
                                            </div>
                                            <div class="col-4 text-end">
                                                35.000
                                            </div>
                                        </td>
                                        <!-- <td class="float-start pt-2">
                                            <center>1 Steak Ayam</center>
                                        </td>
                                        <td class="float-end pt-2">
                                            <center>35.000</center> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="float-start pt-2 text-wrap">
                                            <center>1 Australian Curry Sausagessssssssssssssssssssssssssssssssssssssssssssss</center>
                                        </td>
                                        <td class="float-end pt-2">
                                            <center>45.000</center>
                                        </td> -->
                                        <td class="pt-2 row">
                                            <div class="col-2">
                                                1
                                            </div>
                                            <div class="col-6 pe-0">
                                                Australian Curry Sausages
                                            </div>
                                            <div class="col-4 text-end ps-0">
                                                45.000
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-2 row">
                                            <div class="col-2">
                                                2
                                            </div>
                                            <div class="col-6">
                                                Oreo Milkshake
                                            </div>
                                            <div class="col-4 text-end">
                                                50.000
                                            </div>
                                        </td>
                                        <!-- <td class="float-start pt-2">
                                            <center>2 Oreo Milkshake</center>
                                        </td>
                                        <td class="float-end pt-2">
                                            <center>50.000</center>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td class="pt-2 text-center">
                                            ===============================
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start pt-2">
                                            <center>Items 4</center>
                                        </td>
                                        <td class="float-end pt-2">
                                            <center>130.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Pajak 10%</center>
                                        </td>
                                        <td class="float-end">
                                            <center>13.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Sebelum pembulatan</center>
                                        </td>
                                        <td class="float-end">
                                            <center>143.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Pembulatan</center>
                                        </td>
                                        <td class="float-end">
                                            <center>143.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Total</center>
                                        </td>
                                        <td class="float-end">
                                            <center>143.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Pembayaran Cash</center>
                                        </td>
                                        <td class="float-end">
                                            <center>150.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="float-start">
                                            <center>Kembalian</center>
                                        </td>
                                        <td class="float-end">
                                            <center>7.000</center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-2 text-center">
                                            ===============================
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pt-2 text-center">
                                            Terima Kasih<br>Atas Kunjungan Anda
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
            <div class="row no-print">
                <div class="col-lg-12 text-end">
                    <button class="btn bg-gradient-primary" id="actprint">
                        <i class="bi bi-printer-fill"></i>
                        Print
                    </button>
                </div>
            </div>
        </div>
    </page>
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
</body>

</html>
