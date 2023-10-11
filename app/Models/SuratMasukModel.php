<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'surat_masuk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['file', 'no_surat', 'tanggal', 'sifat_surat', 'pengirim', 'perihal', 'isi_surat', 'id_jenis'];
}
