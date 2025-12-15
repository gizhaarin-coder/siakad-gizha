<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Cek level
if ($_SESSION['level'] != "admin") {
    header("Location: ../index.php");
    exit();
}


$username = $_SESSION['username'];
$level = $_SESSION['level'];

// === HITUNG TOTAL DATA ===

// total mahasiswa
$q_mhs = mysqli_query($konek, "SELECT COUNT(*) AS total FROM mhs");
$mhs = mysqli_fetch_assoc($q_mhs);

// total dosen
$q_dsn = mysqli_query($konek, "SELECT COUNT(*) AS total FROM dosen");
$dsn = mysqli_fetch_assoc($q_dsn);
?>



<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Dashboard Admin</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Admin</li>
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
              <h3 class="card-title">SELAMAT DATANG, <span class="badge bg-danger ms-2"><?= htmlspecialchars($username); ?></span></h3>
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

<!-- INFO TOTAL -->
<div class="row mb-4">

  <div class="col-md-4">
    <div class="card bg-primary text-white">
      <div class="card-body text-center">
        <i class="bi bi-people-fill fs-1 mb-2"></i>
        <h3 class="fw-bold"><?= $mhs['total']; ?></h3>
        <p class="mb-0">Total Mahasiswa</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card bg-success text-white">
      <div class="card-body text-center">
        <i class="bi bi-mortarboard-fill fs-1 mb-2"></i>
        <h3 class="fw-bold"><?= $dsn['total']; ?></h3>
        <p class="mb-0">Total Dosen</p>
      </div>
    </div>
  </div>

</div>
<!-- END INFO TOTAL -->


<hr class="my-4">

              <div class="row justify-content-center">

                <!-- MAHASISWA -->
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body text-center">
                      <i class="bi bi-people-fill fs-1"></i>
                      <h5 class="mt-2 mb-1">Mahasiswa</h5>
                      <p class="mb-2">Kelola data mahasiswa.</p>
                      <a href="?p=mahasiswa" class="btn btn-primary btn-sm">Kelola</a>
                    </div>
                  </div>
                </div>

                <!-- DOSEN -->
                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body text-center">
                      <i class="bi bi-mortarboard-fill fs-1"></i>
                      <h5 class="mt-2 mb-1">Dosen</h5>
                      <p class="mb-2">Kelola data dosen.</p>
                      <a href="?p=dosen" class="btn btn-success btn-sm">Kelola</a>
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
