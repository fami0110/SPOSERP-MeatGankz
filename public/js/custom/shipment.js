const satuan = document.getElementById('satuan');
const berat = document.getElementById('berat');
const harga_exw = document.getElementById('harga_exw');
const total_exw = document.getElementById('total_exw');
const biayaLainnya = document.getElementById('biaya-lainnya');
const total_biaya_lainnya = document.getElementById('total_biaya_lainnya');
const diskon = document.getElementById('diskon');
const total_all = document.getElementById('total');
const harga_all_in = document.getElementById('harga_all_in');

document.addEventListener('DOMContentLoaded', () => {

    // Display satuan
    document.getElementById('stok_id').addEventListener('change', e => {
        for (let opt of e.target.options) {
            if (opt.selected) {
                satuan.value = opt.dataset.satuan;
            }
        }
    })

    // Add biaya lainnya
    document.getElementById('btn-biaya-lainnya').addEventListener('click', () => {
        let biaya = document.createElement('div');
        biaya.setAttribute('class', 'row');
        biaya.innerHTML = `
            <div class="col-sm-6">
                <div class="input-group">
                    <button class="btn btn-danger m-0 px-3 removeItem" type="button">
                        <i class="fa fa-xmark"></i>
                    </button>
                    <input type="text" class="form-control ps-2" name="nama_biaya_lainnya[]" placeholder="Nama biaya" required>
                </div>
            </div>
            <div class="col-sm-6 ps-0">
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control ps-2 biaya-lainnya count" name="biaya_lainnya[]" placeholder="0" min="0" required>
                </div>
            </div>
        `;
        biayaLainnya.appendChild(biaya);
        refreshEvent();
    });

    refreshEvent();
});

function refreshEvent() {
    document.querySelectorAll('#biaya-lainnya .removeItem').forEach(btn => {
        btn.onclick = () => {
            if (biayaLainnya.childElementCount > 1) {
                btn.parentElement.parentElement.parentElement.remove();
                refreshEvent();
            }
        };
    });

    document.querySelectorAll('input.count').forEach(inp => {
        inp.oninput = () => {
            // Hitung total_exw
            let harga_exw_val = parseInt(harga_exw.value) || 0;
            let berat_val = parseInt(berat.value) || 0;

            total_exw.value = harga_exw_val * (berat_val / 1000);

            // Hitung total_biaya_lainnya
            let sub = 0;
            document.querySelectorAll('.biaya-lainnya').forEach(inp => {
                sub += parseInt(inp.value) || 0;
            });
            total_biaya_lainnya.value = sub;

            // Hitung total
            let diskon_val = parseInt(diskon.value) || 0;
            total_all.value = parseInt(total_exw.value) + parseInt(total_biaya_lainnya.value) - diskon_val;

            // Hitung harga all in / kg
            harga_all_in.value = (parseInt(total_all.value) / (berat_val / 1000)).toFixed();
        }
    });
}