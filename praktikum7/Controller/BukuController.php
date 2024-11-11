<?php

require_once "Model/ListBuku.php";
require_once "Model/Buku.php"; // Memastikan class Buku di-include

class BukuController {

    public function jalankan() {
        // Menggunakan model
        $daftar_buku_model = new ListBuku();
        $daftar_buku = $daftar_buku_model->getData();

        // Mengirim dan menampilkan data ke View
        include_once "View/BukuView.php";
    }

    public function edit() {
        $id_buku = $_GET['id_buku'];

        $daftar_buku = new ListBuku();
        $buku = $daftar_buku->getBukuById($id_buku);

        if ($buku) {
            // Memastikan jalur file benar
            include_once "View/EditBukuView.php";
        } else {
            // Redirect jika ID buku tidak ditemukan
            header("Location: http://localhost/index.php");
            exit;
        }
    }

    public function update() {
        // Mendapatkan data dari form update
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];

        // Membuat objek buku baru
        $buku = new Buku($judul, $pengarang, $penerbit, $tahun);
        $buku->setId($id_buku);

        // Memperbarui buku dengan metode update di ListBuku
        $daftar_buku = new ListBuku();
        $status = $daftar_buku->update($buku);

        // Mengatur pesan berhasil atau gagal
        session_start();
        if ($status) {
            $_SESSION['message'] = "Data Buku Dengan ID " . $id_buku . " Berhasil Diperbarui";
        } else {
            $_SESSION['error'] = "Data Gagal Diperbarui!";
        }

        // Redirect ke index.php
        header("Location: http://localhost/index.php");
        exit;
    }

    public function simpan() {
        // Mengambil nilai dari form tambah pada BukuView
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];

        // Buat objek buku dari class Buku
        $buku = new Buku($judul, $pengarang, $penerbit, $tahun);

        // Menyimpan buku dengan metode simpan di class ListBuku
        $daftar_buku = new ListBuku();
        $status = $daftar_buku->simpan($buku);

        session_start();
        if ($status) {
            $_SESSION['message'] = "Data Buku Dengan Judul " . $buku->getJudul() . " Berhasil Disimpan";
        } else {
            $_SESSION['error'] = "Data Gagal Disimpan!";
        }

        // Redirect ke index.php
        header('Location: http://localhost/index.php');
        exit;
    }

    public function hapus() {
        session_start();
        $id_buku = $_POST['id_buku'];
    
        $daftar_buku = new ListBuku();
        $status = $daftar_buku->hapus($id_buku);
    
        if ($status) {
            $_SESSION['message'] = "Data Buku Dengan ID " . $id_buku . " Berhasil Dihapus";
        } else {
            $_SESSION['error'] = "Data Gagal Dihapus!";
        }
    
        // Ambil data terbaru setelah penghapusan
        $daftar_buku = $daftar_buku->getData();

        // Redirect ke index.php
        header('Location: http://localhost/index.php');
        exit;
    }
}
