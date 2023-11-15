document.addEventListener('DOMContentLoaded', () => {
    // Hitung sisa dari pengeluaran
     document.querySelectorAll('input.pengeluaran').forEach(inp => {
        inp.addEventListener('input', () => {
            let sisa = inp.parentElement.parentElement.querySelector('input.sisa');
            let stok = inp.parentElement.parentElement.querySelector('input.stok');

            sisa.value = parseInt(stok.value) - parseInt(inp.value);
        })
     });

    // Hitung pengeluaran dari sisa
    document.querySelectorAll('input.sisa').forEach(inp => {
        inp.addEventListener('input', () => {
            let pengeluaran = inp.parentElement.parentElement.querySelector('input.pengeluaran');
            let stok = inp.parentElement.parentElement.querySelector('input.stok');

            pengeluaran.value = parseInt(stok.value) - parseInt(inp.value);
        })
    });
})