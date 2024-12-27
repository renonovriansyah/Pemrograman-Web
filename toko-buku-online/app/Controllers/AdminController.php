<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChartModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {   
        return view('admin/dashboard');
    }

    public function chart()
    {
    $id_pelanggan = session()->get('id_pelanggan'); // Ambil ID pelanggan dari session
    if (!$id_pelanggan) {
        return redirect()->to(base_url('login'))->with('error', 'Harap login terlebih dahulu.');
    }

    $model = new \App\Models\ChartModel();
    $data['items'] = $model->select('keranjang.*, buku.judul, buku.harga')
                           ->join('buku', 'buku.id_buku = keranjang.id_buku')
                           ->where('id_pelanggan', $id_pelanggan)
                           ->findAll();

    return view('chart', $data);
    }   

    public function addToChart($id_buku)
    {
    $id_pelanggan = session()->get('id_pelanggan'); // Ambil ID pelanggan dari session
    if (!$id_pelanggan) {
        return redirect()->to(base_url('login'))->with('error', 'Harap login terlebih dahulu.');
    }

    $model = new \App\Models\ChartModel();

    // Cek apakah item sudah ada di keranjang
    $existingItem = $model->where(['id_buku' => $id_buku, 'id_pelanggan' => $id_pelanggan])->first();

    if ($existingItem) {
        // Jika item sudah ada, tambahkan jumlahnya
        $model->update($existingItem['id'], [
            'jumlah' => $existingItem['jumlah'] + 1
        ]);
    } else {
        // Jika item belum ada, tambahkan entri baru
        $model->insert([
            'id_pelanggan' => $id_pelanggan,
            'id_buku' => $id_buku,
            'jumlah' => 1,
        ]);
    }

    return redirect()->to(base_url('chart'))->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }

    public function updateChart($id)
    {
    $model = new \App\Models\ChartModel();
    $jumlah = $this->request->getPost('jumlah');

    if ($jumlah <= 0) {
        // Jika jumlah <= 0, hapus item
        $model->delete($id);
        return redirect()->to(base_url('chart'))->with('success', 'Item dihapus dari keranjang.');
    }

    // Update jumlah
    $model->update($id, ['jumlah' => $jumlah]);
    return redirect()->to(base_url('chart'))->with('success', 'Jumlah item berhasil diperbarui.');
    }

    public function checkout()
    {
    $session = session();
    $cart = $session->get('chart');

    if (empty($cart)) {
        return redirect()->to('chart')->with('error', 'Keranjang belanja kosong.');
    }

    // Proses checkout di sini (misalnya simpan ke database)
    $session->remove('chart'); // Kosongkan keranjang setelah checkout

    return redirect()->to('chart')->with('success', 'Checkout berhasil!');
    }

    public function createBuku(){
        $data = $this->request->getpost();
        $file = $this->request->getFile('cover');

        if (!$file->hasMoved()){
            $path = $file->store();
            $data['cover'] = $path;
        }

        $bukuModel = model('BookModel');

        if($bukuModel->insert($data, false)){
            return redirect()->to('admin/daftar-buku')->with('sukses','Data Berhasil Disimpan');
        }else {
            return redirect('admin/daftar-buku')->with('error','Data Gagal Disimpan!');
        }
    }
    public function daftarBuku(){
        $modelBuku = model('BookModel');
        $data['books'] = $modelBuku->findAll();

        return view('admin/daftar-buku', $data);
    }
    public function daftarBukuTambah(){
        return view('admin/daftar-buku-tambah');
    }
    public function daftarBukuEdit($id){
        $modelBuku = new \App\Models\BookModel();
        $buku = $modelBuku->find($id);

        if (!$buku) {
        return redirect()->to('admin/daftar-buku')->with('error', 'Buku tidak ditemukan.');
    }
        return view('admin/daftar-buku-edit', ['buku' => $buku]);
    }

    public function updateBuku($id)
    {
    $modelBuku = new \App\Models\BookModel();
    $buku = $modelBuku->find($id);

    if (!$buku) {
        return redirect()->to('admin/daftar-buku')->with('error', 'Buku tidak ditemukan.');
    }

    $data = $this->request->getPost();

    $file = $this->request->getFile('cover');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        if (!empty($buku['cover'])) {
            $filePath = WRITEPATH . 'uploads/' . $buku['cover'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $data['cover'] = $file->store();
    }

    if ($modelBuku->update($id, $data)) {
        return redirect()->to('admin/daftar-buku')->with('success', 'Buku berhasil diperbarui.');
    }

    return redirect()->to('admin/daftar-buku')->with('error', 'Buku gagal diperbarui.');
    }

    public function daftarBukuHapus($id){
        
    $modelBuku = new \App\Models\BookModel();
    $buku = $modelBuku->find($id);

    if (!$buku) {
        return redirect()->to('admin/daftar-buku')->with('error', 'Buku tidak ditemukan.');
    }
    return view('admin/daftar-buku-hapus', ['buku' => $buku]);
    }

    public function hapusProses($id)
    {
    $bukuModel = new \App\Models\BookModel();
    
    $buku = $bukuModel->find($id);

    if (!$buku) {
        return redirect()->to('admin/daftar-buku')->with('error', 'Buku tidak ditemukan.');
    }

    if ($buku['cover']) {
        $filePath = WRITEPATH . 'uploads/' . $buku['cover'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    $bukuModel->delete($id);

    return redirect()->to('admin/daftar-buku')->with('success', 'Buku berhasil dihapus.');
    }

    public function transaksi(){
        $modelTransaksi = new \App\Models\TransaksiModel(); // Pastikan model ini sudah ada
        $data['transaksi'] = $modelTransaksi->findAll(); // Ambil semua data transaksi

    return view('admin/transaksi', $data);
    }
    public function transaksiUbahStatus(){
        return view('admin/transaksi-ubah-status');
    }
    public function transaksiHapus(){
        return view('admin/transaksi-hapus');
    }

    public function pelanggan(){
        $modelPelanggan = new \App\Models\PelangganModel();
    $data['pelanggan'] = $modelPelanggan->findAll();

    return view('admin/pelanggan', $data);
    }

    public function pelangganTambah()
    {
    return view('admin/pelanggan-tambah');
    }
    public function prosesTambahPelanggan()
    {
    $validation = \Config\Services::validation();

    // Validasi input
    if (!$this->validate([
        'nama' => 'required|min_length[3]',
        'telepon' => 'required|regex_match[/^[0-9]{10,15}$/]',
        'alamat' => 'required|min_length[5]'
    ])) {
        return redirect()->to('admin/pelanggan/tambah')->withInput()->with('errors', $validation->getErrors());
    }

    // Ambil data input
    $data = [
        'nama' => $this->request->getPost('nama'),
        'telepon' => $this->request->getPost('telepon'),
        'alamat' => $this->request->getPost('alamat')
    ];

    $modelPelanggan = new \App\Models\PelangganModel();

    // Simpan data pelanggan
    if ($modelPelanggan->save($data)) {
        return redirect()->to('admin/pelanggan')->with('success', 'Pelanggan berhasil ditambahkan.');
    } else {
        return redirect()->to('admin/pelanggan/tambah')->with('error', 'Gagal menambahkan pelanggan.');
    }
    }

    public function pelangganHapus($id){
        $modelPelanggan = new \App\Models\PelangganModel();
    
    // Cek apakah pelanggan ada
    $pelanggan = $modelPelanggan->find($id);
    
    if (!$pelanggan) {
        return redirect()->to('admin/pelanggan')->with('error', 'Pelanggan tidak ditemukan.');
    }
    
    // Hapus data pelanggan
    $modelPelanggan->delete($id);
    
    return redirect()->to('admin/pelanggan')->with('success', 'Pelanggan berhasil dihapus.');
}
}