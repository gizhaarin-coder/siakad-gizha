<?php

$pesan = ""; // menampung notifikasi

if (isset($_POST['simpan'])) {
    $nidn   = $_POST['nidn'];
    $nama   = $_POST['nama'];
    $jk     = isset($_POST['jk']) ? $_POST['jk'] : "";
    $alamat = $_POST['alamat'];
    $hp     = $_POST['hp'];

    require_once "../config.php";
    $waktu = date("Y-m-d H:i:s");

    $sql = "INSERT INTO dosen SET 
            nidn='$nidn', 
            nama='$nama', 
            jenis_kelamin='$jk', 
            alamat='$alamat', 
            hp='$hp', 
            waktu='$waktu'";

    $query = $konek->query($sql);

    if ($query) {
        $pesan = "
        <div class='alert alert-success d-flex align-items-center'>
            <i class='bi bi-check-circle-fill me-2'></i>
            <span>Data dosen berhasil ditambahkan!</span>
        </div>

        <a href='./?p=dosen' class='btn btn-secondary mb-3'>
            <i class='bi bi-arrow-left'></i> Kembali ke Data Dosen
        </a>
        <hr>
        ";
        // kosongkan form setelah sukses
        $nidn = $nama = $jk = $alamat = $hp = "";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menyimpan data!</div>";
    }
}
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Dosen</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard Administrator</li>
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
                            <h3 class="card-title">Form Input Dosen</h3>
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

                            <?= $pesan ?> <!-- Menampilkan notifikasi -->

                            <form method="post" action="?p=add-dosen">
                                <table>

                                    <tr>
                                        <td>NIDN</td>
                                        <td><input type="text" name="nidn" class="form-control" value="<?= isset($nidn) ? $nidn : '' ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td><input type="text" name="nama" class="form-control" value="<?= isset($nama) ? $nama : '' ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <input type="radio" name="jk" value="L" id="jkL" <?= (isset($jk) && $jk=="L") ? "checked" : "" ?>>
                                            <label for="jkL">Laki-laki</label>

                                            <input type="radio" name="jk" value="P" id="jkP" class="ms-3" <?= (isset($jk) && $jk=="P") ? "checked" : "" ?>>
                                            <label for="jkP">Perempuan</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td valign="top">Alamat</td>
                                        <td>
                                            <textarea name="alamat" class="form-control" style="width:300px" required><?= isset($alamat) ? $alamat : '' ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No. HP</td>
                                        <td><input type="text" name="hp" class="form-control" value="<?= isset($hp) ? $hp : '' ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary mt-2"></td>
                                    </tr>

                                </table>
                            </form>

                        </div>

                        <div class="card-footer"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
