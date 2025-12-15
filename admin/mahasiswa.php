<?php

require_once "../config.php";

$keywoard = isset($_POST['keywoard']) ? $_POST['keywoard'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

if (empty($keywoard)) {
  $n = 0;
  $data = $konek->query("SELECT * FROM mhs ORDER BY nim LIMIT 5");
} else {
  $n = 0;
  if ($category == 1) {
    $data = $konek->query("SELECT * FROM mhs WHERE nim LIKE '%$keywoard%'");
  } elseif ($category == 2) {
    $data = $konek->query("SELECT * FROM mhs WHERE nama LI    IIKE '%$keywoard%'");
  } elseif ($category == 3) {
    $data = $konek->query("SELECT * FROM mhs WHERE jenis_kelamin LIKE '%$keywoard%'");
  } elseif ($category == 4) {
    if ($keywoard == "INF") {
      $keywoard2 = 1;
    } elseif ($keywoard == "ARS") {
      $keywoard2 = 2;
    } elseif ($keywoard == "ILK") {
      $keywoard2 = 3;
    } else {
      $keywoard2 = '';
    }
    $data = $konek->query("SELECT * FROM mhs WHERE prodi LIKE '%$keywoard2%'");
  }
}
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Data Mahasiswa</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <table>
            <tr>
              <td><a href="./?p=add-mahasiswa" class="btn btn-success mb-3">Tambah Mahasiswa</a></td>
              <td>
                <form method="post" action="#" style="display:inline;">
                  <input type="text" name="keywoard" placeholder="Masukkan kata kunci..." class="form-control" 
                         style="width:300px; display:inline;" value="<?= htmlspecialchars($keywoard) ?>"/>
                  <select name="category" class="form-select" style="width:auto; display:inline;">
                    <option value="1" <?php if($category==1) echo "selected"; ?>>NIM</option>
                    <option value="2" <?php if($category==2) echo "selected"; ?>>NAMA</option>
                    <option value="3" <?php if($category==3) echo "selected"; ?>>JENIS KELAMIN</option>
                    <option value="4" <?php if($category==4) echo "selected"; ?>>PRODI</option>
                  </select>
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary btn-sm"/>
                  <input type="submit" value="Search" class="btn btn-primary btn-sm"/>
                </form>
              </td>
            </tr>
          </table>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Mahasiswa</h3>
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
              <table class="table table-striped table-hover">
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Waktu</th>
                  <th>Option</th>
                </tr>

                <?php
                foreach ($data as $d) {
                  $n++;
                  if ($d['prodi'] == 1) {
                    $prodi = "INF";
                  } elseif ($d['prodi'] == 2) {
                    $prodi = "ARS";
                  } elseif ($d['prodi'] == 3) {
                    $prodi = "ILK";
                  } else {
                    $prodi = "-";
                  }

                  echo "
                    <tr>
                      <td>{$n}</td>
                      <td>{$d['nim']}</td>
                      <td>{$d['nama']}</td>
                      <td>{$prodi}</td>
                      <td>{$d['jenis_kelamin']}</td>
                      <td>{$d['alamat']}</td>
                      <td>{$d['waktu']}</td>
                      <td>
                        <a href='./?p=detail-mhs&id={$d['id']}' class='btn btn-sm btn-info'>Detail</a>
                        <a href='./?p=edit-mhs&id={$d['id']}' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='./?p=hapus-mhs&id={$d['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin akan menghapus data ini?');\">Hapus</a>
                      </td>
                    </tr>
                  ";
                }
                ?>
              </table>
            </div>

            <div class="card-footer">
              <p class="text-muted small mb-0">Total Data: <?= $n; ?> Mahasiswa</p>
            </div>

          </div> <!-- end card -->
        </div>
      </div>
    </div>
  </div>
</main>
