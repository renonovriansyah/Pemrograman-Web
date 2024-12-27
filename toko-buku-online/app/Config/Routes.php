<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/chart', 'Home::chart');
$routes->get('/checkout', 'Home::checkout');
$routes->get('/lihat-produk', 'Home::lihatProduk');

service('auth')->routes($routes);
$routes->post('/submit', 'Home::submit');

//admin
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->post('/chart/addToChart/(:num)', 'Home::addToChart/$1');
$routes->post('/chart/update/(:num)', 'Home::updateCart/$1');
$routes->post('/chart/checkout', 'AdminController::checkout');
$routes->get('/admin/daftar-buku', 'AdminController::daftarBuku');
$routes->get('/admin/daftar-buku/tambah', 'AdminController::daftarBukuTambah');
$routes->post('/admin/daftar-buku/tambah', 'AdminController::createBuku');
$routes->get('admin/daftar-buku/edit/(:num)', 'AdminController::daftarBukuEdit/$1');
$routes->post('admin/daftar-buku/update/(:num)', 'AdminController::updateBuku/$1');
$routes->get('admin/daftar-buku/hapus/(:num)', 'AdminController::daftarBukuHapus/$1');
$routes->post('admin/daftar-buku/hapus/(:num)', 'AdminController::hapusProses/$1');

$routes->get('admin/transaksi', 'AdminController::transaksi');
$routes->get('admin/transaksi/ubahstatus/(:num)', 'AdminController::transaksiUbahStatus/$1');
$routes->get('admin/transaksi/hapus/(:num)', 'AdminController::transaksiHapus/$1');

$routes->get('/admin/pelanggan', 'AdminController::pelanggan');
$routes->get('admin/pelanggan/tambah', 'AdminController::pelangganTambah');
$routes->post('admin/pelanggan/tambah', 'AdminController::prosesTambahPelanggan');
$routes->get('admin/pelanggan/hapus/(:num)', 'AdminController::pelangganHapus/$1');

$routes->get('file-image/(:segment)/(:segment)', 'AdminController::image/$1/$2');