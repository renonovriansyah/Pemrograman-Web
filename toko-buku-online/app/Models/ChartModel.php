<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartModel extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pelanggan', 'id_buku', 'jumlah'];
    protected $useTimestamps = true;

    // Validasi jika diperlukan
    protected $validationRules = [
        'id_pelanggan' => 'required|integer',
        'id_buku' => 'required|integer',
        'jumlah' => 'required|integer',
    ];
}
