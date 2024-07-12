<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $judul_buku = $_POST['judulBuku'];
    $kategori_buku = $_POST['kategoriBuku'];
    $penerbit_buku = $_POST['penerbitBuku'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahunTerbit'];
    $isbn = $_POST['iSbn'];
    $j_buku_baik = $_POST['jumlahBukuBaik'];
    $j_buku_rusak = $_POST['jumlahBukuRusak'];

    // Validasi data
    if (empty($judul_buku) || empty($kategori_buku) || empty($penerbit_buku) || empty($pengarang) || empty($tahun_terbit) || empty($isbn) || empty($j_buku_baik) || empty($j_buku_rusak)) {
        $_SESSION['gagal'] = "Data buku tidak lengkap!";
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit; // Berhenti eksekusi skrip jika validasi gagal
    }

    // PROCESS INSERT DATA TO DATABASE
    $sql = "INSERT INTO buku(judul_buku,kategori_buku,penerbit_buku,pengarang,tahun_terbit,isbn,j_buku_baik,j_buku_rusak)
        VALUES('" . $judul_buku . "','" . $kategori_buku . "','" . $penerbit_buku . "','" . $pengarang . "','" . $tahun_terbit . "','" . $isbn . "', '" . $j_buku_baik . "', '" . $j_buku_rusak . "')";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $_SESSION['berhasil'] = "Data buku berhasil ditambahkan!";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data buku gagal ditambahkan!";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    // Kode untuk pengeditan data
    // ...
} elseif ($_GET['act'] == "hapus") {
    // Kode untuk penghapusan data
    // ...
}
?>
