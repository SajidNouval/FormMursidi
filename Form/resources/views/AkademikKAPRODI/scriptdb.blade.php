<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>

<script>
    // JavaScript untuk menangani tombol
    document.getElementById('btnLengkap').addEventListener('click', function() {
      toggleTab('Lengkap');
    });
  
    document.getElementById('btnTerbaik').addEventListener('click', function() {
      toggleTab('Terbaik');
    });
  
    document.getElementById('btnInggris').addEventListener('click', function() {
      toggleTab('Inggris');
    });
  
    function toggleTab(tab) {
      // Sembunyikan semua konten
      document.getElementById('contentLengkap').classList.remove('show', 'active');
      document.getElementById('contentTerbaik').classList.remove('show', 'active');
      document.getElementById('contentInggris').classList.remove('show', 'active');
  
      // Tampilkan konten sesuai tombol yang diklik
      if(tab === 'Lengkap') {
        document.getElementById('contentLengkap').classList.add('show', 'active');
      } else if(tab === 'Terbaik') {
        document.getElementById('contentTerbaik').classList.add('show', 'active');
      } else if(tab === 'Inggris') {
        document.getElementById('contentInggris').classList.add('show', 'active');
      }
    }
  </script>

<script>
  document.getElementById('sks').addEventListener('input', function (event) {
      const sksInput = this.value;
      const errorText = document.getElementById('sksError');

      // Validasi kustom
      if (sksInput < 1) {
          errorText.style.display = 'block'; // Tampilkan pesan error
          this.setCustomValidity('SKS Harus Diisi Minimal 1'); // Set pesan error
      } else {
          errorText.style.display = 'none'; // Sembunyikan pesan error
          this.setCustomValidity(''); // Reset validasi
      }
  });

  document.getElementById('semester').addEventListener('input', function (event) {
      const semesterInput = this.value;
      const errorText = document.getElementById('semesterError');

      // Validasi kustom
      if (semesterInput < 1) {
          errorText.style.display = 'block'; // Tampilkan pesan error
          this.setCustomValidity('Semester Harus Diisi Minimal 1'); // Set pesan error
      } else {
          errorText.style.display = 'none'; // Sembunyikan pesan error
          this.setCustomValidity(''); // Reset validasi
      }
  });
</script>

<!-- Pilih RUANG DULU -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ruangSelect = document.getElementById('ruang');
        const kuotaInput = document.getElementById('kuota');

        // Event listener untuk perubahan pada select ruang
        ruangSelect.addEventListener('change', function () {
            const selectedOption = ruangSelect.options[ruangSelect.selectedIndex];
            const kapasitas = selectedOption.getAttribute('data-kapasitas');

            if (kapasitas) {
                // Aktifkan input kuota
                kuotaInput.disabled = false;

                // Set placeholder untuk kapasitas maksimal
                kuotaInput.placeholder = `Maksimal: ${kapasitas}`;

                // Validasi input kuota saat diubah
                kuotaInput.addEventListener('input', function () {
                    if (parseInt(kuotaInput.value) > parseInt(kapasitas)) {
                        alert(`Kuota tidak boleh melebihi kapasitas ruang (${kapasitas}).`);
                        kuotaInput.value = kapasitas; // Reset nilai ke kapasitas maksimal
                    }
                });
            } else {
                // Nonaktifkan input kuota jika tidak ada ruang yang dipilih
                kuotaInput.disabled = true;
                kuotaInput.placeholder = 'Pilih ruang dulu';
                kuotaInput.value = '';
            }
        });
    });
</script>

<!-- JAM MULAI-JAM SELESAI -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mataKuliahSelect = document.getElementById('mata_kuliah');
        const jamMulaiSelect = document.getElementById('jam_mulai');
        const jamSelesaiSelect = document.getElementById('jam_selesai');

        // Fungsi untuk menghitung jam selesai
        function calculateJamSelesai(jamMulai, sks) {
            const [hours, minutes] = jamMulai.split(':').map(Number);
            const totalHours = hours + parseInt(sks); // Tambahkan SKS ke jam mulai
            return totalHours + ':' + String(minutes).padStart(2, '0'); // Format kembali
        }

        // Fungsi untuk memperbarui dropdown jam selesai
        function updateJamSelesai() {
            const selectedJamMulai = jamMulaiSelect.value;
            const selectedMataKuliah = mataKuliahSelect.options[mataKuliahSelect.selectedIndex];
            const sks = selectedMataKuliah.getAttribute('data-sks');

            if (selectedJamMulai && sks) {
                // Reset dropdown jam selesai
                jamSelesaiSelect.innerHTML = '';

                // Hitung waktu selesai
                const jamSelesai = calculateJamSelesai(selectedJamMulai, sks);

                // Tambahkan opsi ke dropdown jam selesai
                const option = document.createElement('option');
                option.value = jamSelesai;
                option.textContent = jamSelesai;
                jamSelesaiSelect.appendChild(option);

                // Aktifkan dropdown jam selesai
                jamSelesaiSelect.disabled = false;
            } else {
                // Nonaktifkan dropdown jika tidak ada jam mulai atau mata kuliah
                jamSelesaiSelect.innerHTML = '<option value="" disabled selected>Pilih Jam Mulai dan Mata Kuliah</option>';
                jamSelesaiSelect.disabled = true;
            }
        }

        // Event listeners
        mataKuliahSelect.addEventListener('change', updateJamSelesai);
        jamMulaiSelect.addEventListener('change', updateJamSelesai);
    });
</script>


<script>
    function updatePengajarOptions() {
        // Ambil nilai yang dipilih dari dropdown
        const pengampu1 = document.getElementById('pengampu1').value;
        const pengampu2 = document.getElementById('pengampu2').value;
        const pengampu3 = document.getElementById('pengampu3').value;

        // Buat array untuk menyimpan pengajar yang sudah dipilih
        const selectedPengajars = [pengampu1, pengampu2, pengampu3];

        // Ambil semua dropdown pengajar
        const dropdowns = [document.getElementById('pengampu1'), document.getElementById('pengampu2'), document.getElementById('pengampu3')];

        // Loop melalui setiap dropdown
        dropdowns.forEach(dropdown => {
            // Ambil semua opsi dalam dropdown
            const options = dropdown.querySelectorAll('option');

            // Loop melalui setiap opsi
            options.forEach(option => {
                // Jika opsi adalah salah satu yang sudah dipilih, sembunyikan opsi tersebut
                if (selectedPengajars.includes(option.value) && option.value !== "") {
                    option.style.display = 'none'; // Sembunyikan opsi
                } else {
                    option.style.display = 'block'; // Tampilkan opsi
                }
            });
        });
    }
</script>