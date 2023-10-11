<?php

namespace App\Models;

use CodeIgniter\Model;

class DispoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'disposisi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['isi_disposisi', 'unit_kerja_id', 'surat_masuk_id'];
}
