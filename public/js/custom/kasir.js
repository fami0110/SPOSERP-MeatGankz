const BASEURL = window.location.href;
const form = document.querySelector('form');
const clearBtn = document.getElementById('clear');
const subtotalDisplay = document.getElementById('subtotal');
const pajakDisplay = document.getElementById('pajak');
const totalDisplay = document.getElementById('total');
const bayar = document.getElementById('bayar');
const kembali = document.getElementById('kembali');
const paymentMethodSelect = document.getElementById('pembayaran');
const kode_transaksi = document.querySelector('.kode-transaksi');
const daftar_belanja = document.getElementById('daftar-belanja');
const kategori_menu = document.querySelectorAll('.kategori-menu');
let selected_menu = {};

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.menu').forEach(menu => {
        menu.addEventListener('click', () => {
            let id = parseInt(menu.dataset.id);
            let tersedia = JSON.parse(menu.dataset.tersedia);
            let nama = menu.dataset.nama;
            let harga = parseInt(menu.dataset.harga);

            if (tersedia) {
                if (!selected_menu.hasOwnProperty(nama)) {
                    selected_menu[nama] = harga;
                    addList(nama, harga, id);
                }
            } else {
                alert('Menu telah habis!');
            }
        });
    });

    paymentMethodSelect.addEventListener('change', () => {
        switch (paymentMethodSelect.value) {
            case 'debit':
            case 'kredit':
                kode_transaksi.style.display = 'block';
                break;
            default:
                kode_transaksi.style.display = 'none';
                break;
        }
    });

    clearBtn.addEventListener('click', () => {
        if (
            daftar_belanja.childElementCount &&
            confirm('Apakah anda yakin ingin membersihkan daftar belanja?')
        ) {
            clearList();
        }
    });

    bayar.addEventListener('input', () => {
        if (bayar.value == 0) {
            kembali.value = 0;
        } else {
            countReturnPrice(bayar.value);
        }
    });

    document.querySelectorAll('.instant-pay').forEach(btn => {
        btn.addEventListener('click', () => {
            let val = btn.dataset.value;
            if (val == 'pas') {
                countReturnPrice(totalDisplay.value);
            } else {
                countReturnPrice(val);
            }
        });
    });

    document.querySelectorAll('.filter-kategori').forEach(btn => {
        btn.addEventListener('change', () => {
            if (btn.checked) {
                let filter = btn.dataset.kategori;
                switch (filter) {
                    case 'all':
                        kategori_menu.forEach(kategori => toggleDisplay(kategori, true));
                        break;
                    default:
                        kategori_menu.forEach(kategori => toggleDisplay(kategori, false));
                        toggleDisplay(document.querySelector(`.kategori-menu.${filter}`), true);
                        break;
                }
            }
        });
    });

    document.querySelector('.submit-form').addEventListener('click', () => {
        if (document.querySelectorAll('.item').length) {
            if (bayar.value == 0 || !form.checkValidity()) {
                alert('Silahkan cek kembali!');
            } else if (confirm('Apakah anda yakin ingin memproses data ini?')) {
                form.submit();
            }
        } else {
            alert('Daftar belanja kosong!');
        }
    });

    setTimeout(() => {
        document.querySelector('a.nav-link.text-body.p-0').click(); // auto minimize the navbar
    }, 500);
});

function toggleDisplay(element, bool) {
    if (bool) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

function addList(nama, price, id) {
    let item = document.createElement('div');
    item.setAttribute('class', 'row item');
    item.innerHTML = `
        <div class="col-sm-6">
            <input type="hidden" name="id[]" value="${id}">
            <div class="input-group mb-3">
                <button class="btn btn-danger m-0 removeList" type="button" data-nama="${nama}">
                    <i class="fa fa-xmark"></i>
                </button>
                <input type="text" class="item form-control ps-3" name="item[]" value="${nama}" readonly>
            </div>
        </div>
        <div class="col-sm-2 ps-0">
            <input type="number" class="amount form-control ps-2" name="amount[]" data-nama="${nama}" value="1" min="1">
        </div>
        <div class="col-sm-4 ps-0">
            <div class="input-group mb-3">
                <span class="input input-group-text">Rp. </span>
                <input type="number" class="subtotal form-control ps-2" name="item_subtotal[]" value="${price}" readonly>
            </div>
        </div>
    `;
    daftar_belanja.appendChild(item);

    refreshAmountEvent();
}

function removeList(button) {
    delete selected_menu[button.dataset.nama];
    button.parentElement.parentElement.parentElement.remove();

    refreshAmountEvent();
}

function clearList() {
    daftar_belanja.innerHTML = '';
    refreshAmountEvent();
}

function refreshAmountEvent() {
    const allAmountInput = document.querySelectorAll('.amount');
    const allDeleteBtn = document.querySelectorAll('.removeList');

    if (document.querySelectorAll('.item').length) {
        allAmountInput.forEach(amount => {
            amount.onchange = () => {
                const subtotal = amount.parentElement.parentElement.querySelector('.subtotal');
                const nama = amount.dataset.nama;
                subtotal.value = amount.value * selected_menu[nama];
                countTotal();
            };
        });
    
        allDeleteBtn.forEach(btn => {
            btn.onclick = () => {
                removeList(btn);
            }
        });
    
        allAmountInput[allAmountInput.length - 1].focus();
        countTotal();
    } else {
        selected_menu = {};
        form.reset();
        kode_transaksi.style.display = 'none';
    }
}

function countTotal() {
    subtotalDisplay.value = 0;
    document.querySelectorAll('.subtotal').forEach(subtotal => {
        subtotalDisplay.value = parseInt(subtotalDisplay.value) + parseInt(subtotal.value);
    });

    pajakDisplay.value = parseInt(subtotalDisplay.value) * (parseInt(pajakDisplay.dataset.pajak) / 100);

    totalDisplay.value = parseInt(subtotalDisplay.value) + parseInt(pajakDisplay.value);
}

function countReturnPrice(pay) {
    bayar.value = pay;
    let returnPrice = parseInt(bayar.value) - parseInt(totalDisplay.value);
    kembali.value = returnPrice;
}