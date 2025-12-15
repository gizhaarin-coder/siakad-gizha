<form method="post" action="#">

<?php
require_once "../config.php";

$xid = $_GET['id'];

if (isset($_POST['simpan'])) {

    $nidn    = $_POST['nidn'] ?? '';
    $nama    = $_POST['nama'] ?? '';
    $jk      = $_POST['jk'] ?? '';        // diperbaiki
    $alamat  = $_POST['alamat'] ?? '';
    $hp      = $_POST['hp'] ?? '';

    // Tambahan: pastikan jk L/P
    if ($jk !== "L" && $jk !== "P") {
        $jk = "L"; // default, supaya tidak error DB
    }

    $sql = "UPDATE dosen SET 
                nidn='$nidn',
                nama='$nama',
                jenis_kelamin='$jk',
                alamat='$alamat',
                hp='$hp'
            WHERE id='$xid'";

    $q = $konek->query($sql);

    if ($q) {
        echo "<div class='alert alert-success'>
                Berhasil diedit! 
                <a href='./?p=dosen'>Lihat Data!</a>
              </div>";
    }
}
?>


<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Edit Dosen</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Dosen</li>
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
                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
            </div>


            <div class="card-body">
              <div class="row">
                <div class="col-6">

                <?php
                $sql = "SELECT * FROM dosen WHERE id='$xid'";
                $data = $konek->query($sql);

                foreach ($data as $d) {

                    // radio tombol jk
                    $vjkL = $d['jenis_kelamin'] == "L" ? "checked" : "";
                    $vjkP = $d['jenis_kelamin'] == "P" ? "checked" : "";

                    echo "
                    <table class='table table-bordered table-hover table-striped'>
                      <tr>
                        <td>NIDN</td>
                        <td>: <input type='text' name='nidn' value='{$d['nidn']}'></td>
                      </tr>

                      <tr>
                        <td>Nama</td>
                        <td>: <input type='text' name='nama' value='{$d['nama']}'></td>
                      </tr>

                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>:
                          <input type='radio' name='jk' value='L' $vjkL> Laki-laki
                          <input type='radio' name='jk' value='P' $vjkP> Perempuan
                        </td>
                      </tr>

                      <tr>
                        <td>Alamat</td>
                        <td><textarea name='alamat'>{$d['alamat']}</textarea></td>
                      </tr>

                      <tr>
                        <td>No HP</td>
                        <td>: <input type='text' name='hp' value='{$d['hp']}'></td>
                      </tr>

                      <tr>
                        <td></td>
                        <td><input type='submit' value='Simpan' name='simpan'></td>
                      </tr>
                    </table>
                    ";
                }
                ?>

                <a href="./?p=dosen" class="btn btn-secondary"><< Back</a>

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
