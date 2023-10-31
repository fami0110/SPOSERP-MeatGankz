const BASEURL = window.location.href;

const paymentMethodSelect = document.getElementById('pembayaran');
const bayarDiv = document.getElementById('bayar');
const kembalianDiv = document.getElementById('kembalian');
const DebitDiv = document.getElementById('kode_transaksi');

paymentMethodSelect.addEventListener('change', function() {
    if (paymentMethodSelect.value === 'cash') {
        bayarDiv.style.display = 'block';
        kembalianDiv.style.display = 'block';
        DebitDiv.style.display = 'none';
    } else if (paymentMethodSelect.value === 'debit' || paymentMethodSelect.value === 'kredit') {
        DebitDiv.style.display = 'block';
        bayarDiv.style.display = 'none';
        kembalianDiv.style.display = 'none'; 
    } else {
        bayarDiv.style.display = 'none';
        kembalianDiv.style.display = 'none';
        DebitDiv.style.display = 'none';
    }
});