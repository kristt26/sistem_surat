<?php

namespace App\Controllers;

use App\Models\JenisModel;
use App\Models\SuratKeluarModel;
use App\Models\SuratMasukModel;

class Laporan extends BaseController
{
    protected $masuk;
    protected $keluar;
    protected $conn;
    public function __construct()
    {
        $this->masuk = new SuratMasukModel();
        $this->keluar = new SuratKeluarModel();
        $this->conn = \Config\Database::connect();
    }
    public function index()
    {
        $data['title'] = "Laporan";
        $data['icon'] = "fas fa-print";
        return view('laporan', $data);
    }

    public function read($param = null)
    {
        if ($param == 'masuk') $data = $this->masuk->select("surat_masuk.*, jenis.nama_jenis")->join('jenis', 'jenis.id=surat_masuk.id_jenis')->findAll();
        else $data = $this->keluar->select("surat_keluar.*, jenis.nama_jenis")->join('jenis', 'jenis.id=surat_keluar.id_jenis')->findAll();
        return $this->respond($data);
    }

    public function print($param = null)
    {
        if ($param == 'masuk'){
            $data['data'] = $this->masuk->select("surat_masuk.*, jenis.nama_jenis")->join('jenis', 'jenis.id=surat_masuk.id_jenis')->findAll();
            return view('laporan/masuk', $data);
        }
        else{
            $data['data'] = $this->keluar->select("surat_keluar.*, jenis.nama_jenis")->join('jenis', 'jenis.id=surat_keluar.id_jenis')->findAll();
            return view('laporan/keluar', $data);
        }
    }
}
