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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </script>

  {{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Seleksi semua tombol dengan class "remove-course"
    const removeButtons = document.querySelectorAll('.remove-course');

    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const courseCode = this.getAttribute('data-kode');
            if (confirm(`Apakah Anda yakin ingin menghapus mata kuliah dengan kode ${courseCode}?`)) {
                // Kirimkan request AJAX untuk menghapus course
                console.log(`Hapus mata kuliah dengan kode: ${courseCode}`);
                // Tambahkan logika penghapusan sesuai kebutuhan
            }
        });
    });
});
  </script> --}}
  <script>
// Fungsi untuk memuat data semester berdasarkan pilihan dropdown
function loadSemesterData(semester) {
  if (semester === "") {
    document.getElementById('semester-data').innerHTML = "";
    return;
  }

  // Menyiapkan AJAX request untuk mengambil data dari server
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `/getIrsBySemester/${semester}`, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      const irsData = JSON.parse(xhr.responseText);
      let tableContent = `
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>NO</th>
                <th>KODE</th>
                <th>MATA KULIAH</th>
                <th>KELAS</th>
                <th>SKS</th>
                <th>RUANG</th>
                <th>STATUS</th>
                <th>NAMA DOSEN</th>
              </tr>
            </thead>
            <tbody>
      `;
      
      irsData.forEach((course, index) => {
        tableContent += `
          <tr>
            <td>${index + 1}</td>
            <td>${course.kode_mk}</td>
            <td>${course.nama_mk}</td>
            <td>${course.kelas}</td>
            <td>${course.sks}</td>
            <td>${course.ruang}</td>
            <td>${course.status}</td>
            <td>${course.dosen}</td>
          </tr>
        `;
      });

      tableContent += `</tbody></table></div>`;
      document.getElementById('semester-data').innerHTML = tableContent;
    }
  };
  xhr.send();
}
</script>