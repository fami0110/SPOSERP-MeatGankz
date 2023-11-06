<?php Get::view('templates/header', $data) ?>

<link rel="stylesheet" href="<?= BASEURL; ?>/css/invoice.css">

<?php $pembayaran = $data['pembayaran']; ?>

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
                                        <img src="<?= Get::model('Preferences')->getPreference('Direktori_Logo') ?>" class="img-fluid" width="40%">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%" valign="middle" style="text-align: center" class="fs-6">
                                        <?= Get::model('Preferences')->getPreference('Nama_Perusahaan') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%" valign="middle" style="text-align: center">
                                        <?= Get::model('Preferences')->getPreference('Alamat_Perusahaan') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%" valign="middle" style="text-align: center">
                                        Telp. <?= Get::model('Preferences')->getPreference('No_Telp_Perusahaan') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start pt-4">
                                        <?= date('d F Y', strtotime($pembayaran['created_at'])) ?>
                                    </td>
                                    <td class="float-end pt-4">
                                        <?= date('H.i', strtotime($pembayaran['created_at'])) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Transaksi
                                    </td>
                                    <td class="float-end">
                                        TRX-<?= (($pembayaran['id'] <= 10) ? '0' : '') . $pembayaran['id'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Kasir
                                    </td>
                                    <td class="float-end">
                                        <?= $pembayaran['kasir'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Pelanggan
                                    </td>
                                    <td class="float-end">
                                        <?= $pembayaran['pelanggan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        No. WhatsApp
                                    </td>
                                    <td class="float-end">
                                        <?= $pembayaran['nomor_telp'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-2 text-center">
                                        ===============================
                                    </td>
                                </tr>
                                <?php foreach (json_decode($pembayaran['detail_pembayaran'], true) as $detail) : ?>
                                    <tr>
                                        <td class="pt-2 row">
                                            <div class="col-6">
                                                <?= $detail['item'] ?>
                                            </div>
                                            <div class="col-2">
                                                <?= $detail['amount'] ?>
                                            </div>
                                            <div class="col-4 text-end">
                                                <?= number_format($detail['subtotal'], 0, '', '.') ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td class="pt-2 text-center">
                                        ===============================
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start pt-2">
                                        Subtotal
                                    </td>
                                    <td class="float-end pt-2">
                                        <?= number_format($pembayaran['subtotal'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Pajak (<?= $data['pajak'] ?>%)
                                    </td>
                                    <td class="float-end">
                                        <?= number_format($pembayaran['pajak'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Total
                                    </td>
                                    <td class="float-end">
                                        <?= number_format($pembayaran['total'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Bayar
                                    </td>
                                    <td class="float-end">
                                        <?= number_format($pembayaran['bayar'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="float-start">
                                        Kembali
                                    </td>
                                    <td class="float-end">
                                        <?= number_format($pembayaran['kembali'], 0, ',', '.') ?>
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
    </div>
</page>

<div class="position-fixed no-print" style="bottom: 0.5rem; right: 2rem;">
    <a href="<?= BASEURL ?>/pesanan/kasir" class="btn btn-dark">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
    <button class="btn bg-gradient-primary" id="actprint">
        <i class="bi bi-printer-fill"></i>
        Print
    </button>
</div>

<script src="<?= BASEURL; ?>/js/jquery-1.10.2.js"></script>

<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        $("#actprint").click(function() {
            window.print();
            return false;
        });
    });
</script>

<?php Get::view('templates/footer', $data) ?>