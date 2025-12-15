<?php
require_once "../config.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



// AMBIL USERNAME DARI SESSION
$username = $_SESSION['username'];

// AMBIL DATA USER
$qUser = mysqli_query($konek, "SELECT * FROM mhs WHERE nim='$username'");
$dUser = mysqli_fetch_assoc($qUser);

// JIKA DATA USER TIDAK ADA
if (!$dUser) {
    echo "<div style='padding:20px; text-align:center; font-size:20px; color:red;'>
            Akun tidak ditemukan.
          </div>";
    exit;
}
$nim = $_SESSION['username'];
$mhs = $konek->query("SELECT * FROM mhs WHERE nim='$nim'")->fetch_assoc();


// JIKA DATA MAHASISWA TIDAK ADA
if (!$mhs) {
    echo "
    <main class='app-main'>
      <div class='app-content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='alert alert-danger mt-4'>
                <h4><b>Data Anda Tidak Ditemukan</b></h4>
                <p>Anda berhasil login, tetapi data mahasiswa Anda belum tersedia di sistem.</p>
                <p>Silakan hubungi administrator untuk membantu perbaikan data.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    ";
    exit;
}

// KONVERSI PRODI
$prodi = "-";
if ($mhs['prodi'] == 1) $prodi = "INF";
elseif ($mhs['prodi'] == 2) $prodi = "ARS";
elseif ($mhs['prodi'] == 3) $prodi = "ILK";
?>


<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Profil Mahasiswa</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil Mahasiswa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0">Data Profil Anda</h4>
            </div>

            <div class="card-body">

              <table class="table table-bordered table-striped">
                <tr>
                  <th width="200">NIM</th>
                  <td><?= $mhs['nim'] ?></td>
                </tr>

                <tr>
                  <th>Nama</th>
                  <td><?= $mhs['nama'] ?></td>
                </tr>

                <tr>
                  <th>Program Studi</th>
                  <td><?= $prodi ?></td>
                </tr>

                <tr>
                  <th>Jenis Kelamin</th>
                  <td><?= $mhs['jenis_kelamin'] ?></td>
                </tr>

                <tr>
                  <th>Alamat</th>
                  <td><?= $mhs['alamat'] ?></td>
                </tr>

                <tr>
                  <th>Waktu Input</th>
                  <td><?= $mhs['waktu'] ?></td>
                </tr>
              </table>

            </div>

          </div> <!-- end card -->

        </div>
      </div>
    </div>
  </div>
</main>
