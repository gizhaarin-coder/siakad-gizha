<?php

require_once "../config.php";

$keyword  = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

if (empty($keyword)) {
    $nomor = 0;
    $data = $konek->query("SELECT * FROM dosen ORDER BY id DESC LIMIT 10");
} else {
    $nomor = 0;

    if ($category == 1) {
        $data = $konek->query("SELECT * FROM dosen WHERE nidn LIKE '%$keyword%' ORDER BY id DESC");
    } elseif ($category == 2) {
        $data = $konek->query("SELECT * FROM dosen WHERE nama LIKE '%$keyword%' ORDER BY id DESC");
    } elseif ($category == 3) {
        // Convert pencarian L / P
        if (strtolower($keyword) == "l" || strtolower($keyword) == "laki") {
            $keyword2 = "L";
        } elseif (strtolower($keyword) == "p" || strtolower($keyword) == "perempuan") {
            $keyword2 = "P";
        } else {
            $keyword2 = $keyword;
        }
        $data = $konek->query("SELECT * FROM dosen WHERE jenis_kelamin LIKE '%$keyword2%' ORDER BY id DESC");
    } else {
        $data = $konek->query("SELECT * FROM dosen ORDER BY id DESC");
    }
}
?>

<main class="app-main">

  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Data Dosen</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Dosen</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="app-content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">

          <!-- Tombol + Form Pencarian -->
          <table>
            <tr>
              <td><a href="./?p=add-dosen" class="btn btn-success mb-3">Tambah Dosen</a></td>
              <td>
                <form method="post" action="#" style="display:inline;">
                  <input type="text" name="keyword" placeholder="Masukkan kata kunci..."
                         class="form-control"
                         style="width:280px; display:inline;"
                         value="<?= htmlspecialchars($keyword) ?>">

                  <select name="category" class="form-select" style="width:auto; display:inline;">
                    <option value="1" <?= ($category == 1 ? "selected" : "") ?>>NIDN</option>
                    <option value="2" <?= ($category == 2 ? "selected" : "") ?>>Nama</option>
                    <option value="3" <?= ($category == 3 ? "selected" : "") ?>>Jenis Kelamin</option>
                  </select>

                  <input type="reset" value="Reset" class="btn btn-secondary btn-sm">
                  <input type="submit" value="Search" class="btn btn-primary btn-sm">
                </form>
              </td>
            </tr>
          </table>

          <div class="card">

            <div class="card-header">
              <h3 class="card-title">Daftar Dosen</h3>

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

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Waktu</th>
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($data as $d): $nomor++; ?>
                  <tr>
                    <td><?= $nomor ?></td>
                    <td><?= htmlspecialchars($d['nidn']) ?></td>
                    <td><?= htmlspecialchars($d['nama']) ?></td>
                    <td><?= $d['jenis_kelamin'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
                    <td><?= nl2br(htmlspecialchars($d['alamat'])) ?></td>
                    <td><?= htmlspecialchars($d['hp']) ?></td>
                    <td><?= $d['waktu'] ?></td>

                    <td>
                      <a href="?p=detail-dosen&id=<?= $d['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                      <a href="?p=edit-dosen&id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a onclick="return confirm('Yakin ingin menghapus data ini?')"
                         href="?p=hapus-dosen&id=<?= $d['id'] ?>"
                         class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>

            <div class="card-footer">
              <p class="text-muted small mb-0">Total Data: <?= $nomor ?> Dosen</p>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</main>
