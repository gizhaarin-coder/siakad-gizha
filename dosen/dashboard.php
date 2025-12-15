<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Cek level
if ($_SESSION['level'] != "dosen") {
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username'];
$level = $_SESSION['level'];

// --- Ambil data mahasiswa ---
include '../config.php';
$dosen = $konek->query("SELECT * FROM dosen WHERE nidn='$username'")->fetch_assoc();

// Cek apakah data mahasiswa ada
$nama_dosen = $dosen['nama'] ??  'Maaf, data Anda tidak ada. Silakan minta admin untuk input data.'; // fallback jika null
?>


<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Dashboard Dosen</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Dosen</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">

          <!--begin::Card-->
          <div class="card">

            <!--begin::Card Header-->
            <div class="card-header">
              <h3 class="card-title">SELAMAT DATANG, <span class="badge bg-danger ms-2"><?= htmlspecialchars($nama_dosen); ?></span></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
            </div>
            <!--end::Card Header-->

            <!--begin::Card Body-->
            <div class="card-body">

              <div class="row justify-content-center">
                <!-- DOSEN -->
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body text-center">
                      <i class="bi bi-mortarboard-fill fs-1"></i>
                      <h5 class="mt-2 mb-1">Dosen</h5>
                      <p class="mb-2">Lihat Profil dosen.</p>
                      <a href="?p=dosen" class="btn btn-success btn-sm">Lihat</a>
                    </div>
                  </div>
                </div>

              </div>

            </div>
            <!--end::Card Body-->

            <div class="card-footer"></div>

          </div>
          <!--end::Card-->

        </div>
      </div>

    </div>
  </div>
  <!--end::App Content-->

</main>
