<?php

namespace App\Controllers;

use App\Models\BookModel;

class Home extends BaseController
{
    public function index()
    {
        $bookModel = new BookModel();

        // Ambil data input pencarian
        $judul = $this->request->getGet('judul');
        $pengarang = $this->request->getGet('pengarang');
        $penerbit = $this->request->getGet('penerbit');

        // Query awal
        $query = $bookModel;

        // Filter berdasarkan input pencarian
        if (!empty($judul)) {
            $query = $query->like('judul', $judul);
        }
        if (!empty($pengarang)) {
            $query = $query->like('pengarang', $pengarang);
        }
        if (!empty($penerbit)) {
            $query = $query->like('penerbit', $penerbit);
        }

        // Dapatkan hasil pencarian
        $data['books'] = $query->findAll();
        $data['items'] = []; // Jika ada keranjang, sesuaikan data ini.

        return view('index', $data);
    }

    public function chart(){
        return view('chart');
    }

    public function checkout(){
        return view('checkout');
    }

    public function submit(){
        return view ('submit');
    }

    public function lihatProduk()
    {
    $bookModel = new BookModel(); // Pastikan model sudah dibuat
    $data['books'] = $bookModel->findAll(); // Ambil semua buku dari database
    return view('lihat-produk', $data); // Tampilkan view daftar buku
    }

}
