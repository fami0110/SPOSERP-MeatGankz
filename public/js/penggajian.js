// hitung gaji 
const potonganSuratPeringatan1Input = document.getElementById("potonganSuratPeringatan1");
const potonganSuratPeringatan2Input = document.getElementById("potonganSuratPeringatan2");
const gajiPokokInput = document.getElementById("gajiPokok");
const gajiTunjanganInput = document.getElementById("gajiTunjangan");
const gajiLemburInput = document.getElementById("gajiLembur");
const gajiBonusInput = document.getElementById("gajiBonus");
const gajiPotonganInput = document.getElementById("gajiPotongan");
const gajiTotalInput = document.getElementById("gajiTotal");
const jabatanPegawaiSelect = document.getElementById("jabatanPegawai");

function hitungGaji() {
  let gajiPokok = 0;
  let gajiTunjangan = parseInt(gajiTunjanganInput.value) || 0;
  let gajiLembur = parseInt(gajiLemburInput.value) || 0;
  let gajiBonus = parseInt(gajiBonusInput.value) || 0;

  switch (jabatanPegawaiSelect.value) {
    case 'A':
      gajiPokok = 1000000;
      break;
    case 'B':
      gajiPokok = 1500000;
      break;
  }
  gajiPokokInput.value = gajiPokok;

  let gajiPotongan = (parseInt(potonganSuratPeringatan1Input.value) || 0) + (parseInt(potonganSuratPeringatan2Input.value) || 0);
  gajiPotonganInput.value = gajiPotongan;

  gajiTotalInput.value = gajiPokok + gajiTunjangan + gajiLembur + gajiBonus - gajiPotongan;
}

document.querySelectorAll('.gaji-input').forEach(input => {
  input.addEventListener('input', hitungGaji);
});
//hitung gaji end

// reset modal
function setupModalReset(modalId) {
  const modalElement = document.getElementById(modalId);
  if (!modalElement) return;

  const modalForm = modalElement.querySelector('form');
  if (!modalForm) return;

  modalElement.addEventListener('hidden.bs.modal', () => {
    modalForm.reset();
  });

  const batalButton = modalElement.querySelector('button[data-bs-dismiss="modal"]');
  if (batalButton) {
    batalButton.addEventListener('click', () => {
      modalForm.reset();
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const modalIds = ['modalGaji', 'modalGajiJabatan'];
  modalIds.forEach(modalId => {
    setupModalReset(modalId);
  });
});
// reset modal end

// reset modal
function setupModalReset(modalId) {
  const modalElement = document.getElementById(modalId);
  if (!modalElement) return;

  const modalForm = modalElement.querySelector('form');
  if (!modalForm) return;

  modalElement.addEventListener('hidden.bs.modal', () => {
    modalForm.reset();
  });

  const batalButton = modalElement.querySelector('button[data-bs-dismiss="modal"]');
  if (batalButton) {
    batalButton.addEventListener('click', () => {
      modalForm.reset();
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const modalIds = ['modalGaji', 'modalGajiJabatan'];
  modalIds.forEach(modalId => {
    setupModalReset(modalId);
  });
});
// reset modal end



// input laporan gaji 
const currentMonth = new Date().getMonth() + 1;
const currentYear = new Date().getFullYear();

const monthSelect = document.getElementById("month");
const yearSelect = document.getElementById("year");

for (let year = currentYear; year >= 2020; year--) {
  const yearOption = document.createElement("option");
  yearOption.value = year;
  yearOption.textContent = year;
  if (year === currentYear) {
    yearOption.setAttribute("selected", "selected");
  }
  yearSelect.appendChild(yearOption);
}

for (let month = 1; month <= 12; month++) {
  const monthOption = document.createElement("option");
  monthOption.value = month;
  monthOption.textContent = new Date(0, month - 1).toLocaleString('default', { month: 'long' });
  if (month === currentMonth) {
    monthOption.setAttribute("selected", "selected");
  }
  monthSelect.appendChild(monthOption);
}
// end input laporan gaji