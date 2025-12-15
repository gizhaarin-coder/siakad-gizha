<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek level
if ($_SESSION['level'] != "dosen") {
    header("Location: ../index.php");
    exit();
}

// Ambil username dosen dari session
$nidn = $_SESSION['username'];

// AMBIL DATA USER
$qUser = mysqli_query($konek, "SELECT * FROM dosen WHERE nidn='$nidn'");
$dUser = mysqli_fetch_assoc($qUser);

// JIKA DATA USER TIDAK ADA
if (!$dUser) {
    echo "<div style='padding:20px; text-align:center; font-size:20px; color:red;'>
            Akun tidak ditemukan.
          </div>";
    exit;
}

// Ambil data dosen dari database
include '../config.php';
$dosen = $konek->query("SELECT * FROM dosen WHERE nidn='$nidn'")->fetch_assoc();
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Profil Dosen</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil Dosen</li>
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
            <div class="card-header bg-success text-white">
              <h4 class="mb-0">Data Profil Anda</h4>
            </div>

            <div class="card-body">

              <table class="table table-bordered table-striped">
                <tr>
                  <th width="200">NIDN</th>
                  <td><?= $dosen['nidn'] ?></td>
                </tr>

                <tr>
                  <th>Nama</th>
                  <td><?= $dosen['nama'] ?></td>
                </tr>

                <tr>
                  <th>Jenis Kelamin</th>
                  <td>
                    <?php 
                      if(isset($dosen['jenis_kelamin'])) {
                        echo ($dosen['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                      }
                    ?>
                  </td>
                </tr>

                <tr>
                  <th>Alamat</th>
                  <td><?= $dosen['alamat'] ?></td>
                </tr>

                <tr>
                  <th>No. HP</th>
                  <td><?= $dosen['hp'] ?></td>
                </tr>

                <tr>
                  <th>Waktu Input</th>
                  <td><?= $dosen['waktu'] ?></td>
                </tr>
              </table>

            </div>

          </div> <!-- end card -->

        </div>
      </div>
    </div>
  </div>
</main>
