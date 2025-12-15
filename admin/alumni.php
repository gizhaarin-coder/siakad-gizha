<?php
require_once "../config.php";

$keyword  = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

if (empty($keyword)) {
    $nomor = 0;
    $data = $konek->query("SELECT * FROM alumni ORDER BY id DESC LIMIT 10");
} else {
    $nomor = 0;

    if ($category == 1) {
        $data = $konek->query("SELECT * FROM alumni WHERE nim LIKE '%$keyword%' ORDER BY id DESC");
    } elseif ($category == 2) {
        $data = $konek->query("SELECT * FROM alumni WHERE nama LIKE '%$keyword%' ORDER BY id DESC");
    } elseif ($category == 3) {
        // Convert pencarian L / P
        if (strtolower($keyword) == "l" || strtolower($keyword) == "laki") {
            $keyword2 = "L";
        } elseif (strtolower($keyword) == "p" || strtolower($keyword) == "perempuan") {
            $keyword2 = "P";
        } else {
            $keyword2 = $keyword;
        }
        $data = $konek->query("SELECT * FROM alumni WHERE jenis_kelamin LIKE '%$keyword2%' ORDER BY id DESC");
    } elseif ($category == 4) {
        $data = $konek->query("SELECT * FROM alumni WHERE tahun_lulus LIKE '%$keyword%' ORDER BY id DESC");
    } else {
        $data = $konek->query("SELECT * FROM alumni ORDER BY id DESC");
    }
}
?>

<main class="app-main">

  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Data Alumni</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Alumni</li>
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
              <td><a href="./?p=add-alumni" class="btn btn-success mb-3">Tambah Alumni</a></td>
              <td>
                <form method="post" action="#" style="display:inline;">
                  <input type="text" name="keyword" placeholder="Masukkan kata kunci..."
                         class="form-control"
                         style="width:280px; display:inline;"
                         value="<?= htmlspecialchars($keyword) ?>">

                  <select name="category" class="form-select" style="width:auto; display:inline;">
                    <option value="1" <?= ($category == 1 ? "selected" : "") ?>>NIM</option>
                    <option value="2" <?= ($category == 2 ? "selected" : "") ?>>Nama</option>
                    <option value="3" <?= ($category == 3 ? "selected" : "") ?>>Jenis Kelamin</option>
                    <option value="4" <?= ($category == 4 ? "selected" : "") ?>>Tahun Lulus</option>
                  </select>

                  <input type="reset" value="Reset" class="btn btn-secondary btn-sm">
                  <input type="submit" value="Search" class="btn btn-primary btn-sm">
                </form>
              </td>
            </tr>
          </table>

          <div class="card">

            <div class="card-header">
              <h3 class="card-title">Daftar Alumni</h3>

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
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Tahun Lulus</th>
                    <th>Waktu</th>
                    <th>Option</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($data as $d): $nomor++; ?>
                  <tr>
                    <td><?= $nomor ?></td>
                    <td><?= htmlspecialchars($d['nim']) ?></td>
                    <td><?= htmlspecialchars($d['nama']) ?></td>
                    <td><?= $d['jenis_kelamin'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
                    <td><?= nl2br(htmlspecialchars($d['alamat'])) ?></td>
                    <td><?= htmlspecialchars($d['hp']) ?></td>
                    <td><?= htmlspecialchars($d['tahun_lulus']) ?></td>
                    <td><?= $d['waktu'] ?></td>

                    <td>
                      <a href="?p=detail-alumni&id=<?= $d['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                      <a href="?p=edit-alumni&id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a onclick="return confirm('Yakin ingin menghapus data ini?')"
                         href="?p=hapus-alumni&id=<?= $d['id'] ?>"
                         class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>

            <div class="card-footer">
              <p class="text-muted small mb-0">Total Data: <?= $nomor ?> Alumni</p>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>

</main>
