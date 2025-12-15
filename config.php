<?php
$konek = new mysqli("localhost", "root", "", "siakaddb");

if ($konek->connect_errno) {
    echo "Koneksi Gagal! " . $konek->connect_error;
} else {
    // echo "Koneksi Sukses!";
}
?>
