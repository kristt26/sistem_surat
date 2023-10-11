<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'surat_keluar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['file', 'no_surat', 'tanggal', 'sifat_surat', 'pengirim', 'perihal', 'tujuan', 'alamat', 'id_jenis'];
}
