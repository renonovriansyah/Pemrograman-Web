<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi'; // Nama tabel di database
    protected $primaryKey = 'id_transaksi'; // Primary key tabel
    protected $allowedFields = ['id_pelanggan', 'tanggal', 'total', 'status']; // Kolom yang diizinkan untuk diisi
}
