<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Hapus Mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hapus Mahasiswa</li>
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
            <div class="card-header">
              <h3 class="card-title">Dashboard</h3>
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

            <div class="card-body">
              <div class="row">
                <div class="col-6">

                  <?php
                  require_once "../config.php";

                  if (isset($_GET['id'])) {
                    $xid = $_GET['id'];
                    $sql = "DELETE FROM mhs WHERE id='$xid'";
                    $query = $konek->query($sql);

                    if ($query) {
                      echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
                    } else {
                      echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
                    }
                  } else {
                    echo "<div class='alert alert-warning'>ID tidak ditemukan.</div>";
                  }
                  ?>

                  <a href="./?p=mahasiswa" class="btn btn-secondary">&lt;&lt; Kembali</a>

                </div>

                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div id="sidebar-color-code" class="w-100"></div>
                </div>
              </div>
            </div>

            <div class="card-footer"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
