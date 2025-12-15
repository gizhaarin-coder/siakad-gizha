<?php
$pesan = ""; // untuk menyimpan notifikasi

if (isset($_POST['simpan'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $jk    = isset($_POST['jk']) ? $_POST['jk'] : "";
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];

    require_once "../config.php";
    $waktu = date("Y-m-d H:i:s");

    $sql = "INSERT INTO mhs SET nim='$nim', nama='$nama', jenis_kelamin='$jk', alamat='$alamat', prodi='$prodi', waktu='$waktu'";
    $tes = $konek->query($sql);

    if ($tes) {
        $pesan = "
        <div class='alert alert-success d-flex align-items-center' role='alert'>
            <i class='bi bi-check-circle-fill me-2'></i>
            <span>Data berhasil ditambahkan!</span>
        </div>
        <a href='./?p=mahasiswa' class='btn btn-secondary'>
            <i class='bi bi-arrow-left'></i> Kembali ke Data Mahasiswa
        </a>
        <hr>
        ";
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
                    <h3 class="mb-0">Tambah Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Administrator</li>
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
                            <h3 class="card-title">Form Input Mahasiswa</h3>
                        </div>

                        <div class="card-body">

                            <?= $pesan ?> <!-- Menampilkan notifikasi -->

                            <form method="post" action="?p=add-mhs">
                                <table>
                                    <tr>
                                        <td>NIM</td>
                                        <td><input type="number" name="nim" class="form-control" required></td>
                                    </tr>

                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td><input type="text" name="nama" class="form-control" required></td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <input type="radio" name="jk" value="L" id="jkL">
                                            <label for="jkL">Laki-laki</label>

                                            <input type="radio" name="jk" value="P" id="jkP" class="ms-3">
                                            <label for="jkP">Perempuan</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td valign="top">Alamat</td>
                                        <td>
                                            <textarea name="alamat" class="form-control" style="width:300px" required></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Program Studi</td>
                                        <td>
                                            <select class="form-control" name="prodi" required>
                                                <option value="">-- Pilih Prodi --</option>
                                                <option value="1">Informatika</option>
                                                <option value="2">Arsitektur</option>
                                                <option value="3">Ilmu Lingkungan</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary mt-3">
                                        </td>
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
