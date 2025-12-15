<?php

if (isset($_GET['p']) && $_GET['p'] === 'add-mahasiswa') {
    $_GET['p'] = 'add-mhs';
}

$p = isset($_GET['p']) ? $_GET['p'] : 'dashboard'; 
switch ($p) {
    case 'edit-mhs': require_once "edit-mahasiswa.php"; break;
    case 'detail-mhs': require_once "detail-mahasiswa.php"; break;
    case 'hapus-mhs': require_once "hapus-mahasiswa.php"; break;
    case 'dosen': require_once "dosen.php"; break;
    case 'mahasiswa': require_once "mahasiswa.php"; break;
    case 'add-mhs': require_once "add-mahasiswa.php"; break;
    case 'add-dosen': require_once "add-dosen.php"; break;
    case 'edit-dosen': require_once "edit-dosen.php"; break;
    case 'detail-dosen': require_once "detail-dosen.php"; break;
    case 'hapus-dosen': require_once "hapus-dosen.php"; break;
    default: require_once "dashboard.php"; break;
    
}
?>
