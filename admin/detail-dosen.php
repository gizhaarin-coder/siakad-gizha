<main class="app-main">

  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Detail Dosen</h3>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Dosen</li>
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

                  $xid = $_GET['id'];
                  $sql = "SELECT * FROM dosen WHERE id='$xid'";
                  $data = $konek->query($sql);

                  foreach ($data as $d) {

                    echo "
                    <table class='table table-bordered table-hover table-striped'>
                      <tr><td>NIDN</td><td>: {$d['nidn']}</td></tr>
                      <tr><td>Nama</td><td>: {$d['nama']}</td></tr>
                      <tr><td>Jenis Kelamin</td><td>: {$d['jenis_kelamin']}</td></tr>
                      <tr><td>Alamat</td><td>: {$d['alamat']}</td></tr>
                      <tr><td>No. HP</td><td>: {$d['hp']}</td></tr>
                      <tr><td>Waktu Input</td><td>: {$d['waktu']}</td></tr>
                    </table>
                    ";
                  }
                  ?>

                  <a href="./?p=dosen" class="btn btn-secondary"><< Back</a>

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
