<?php

namespace App\Controllers;

use App\Libraries\Decode;
use App\Models\DispoModel;
use App\Models\JenisModel;
use App\Models\SuratKeluarModel;
use App\Models\UnitModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Keluar extends BaseController
{
    protected $jenis;
    protected $keluar;
    protected $unit;
    protected $conn;
    protected $Lib;
    public function __construct() {
        $this->jenis = new JenisModel();
        $this->keluar = new SuratKeluarModel();
        $this->unit = new UnitModel();
        $this->conn = \Config\Database::connect();
        $this->Lib = New Decode();
    }

    public function index()
    {
        $data['title'] = "Surat Keluar";
        $data['icon'] = "fas fa-paper-plane";
        return view('keluar', $data);
    }

    public function read()
    {
        $data['jenis'] = $this->jenis->findAll();
        $data['unit'] = $this->unit->findAll();
        $data['keluar'] = $this->keluar->select("surat_keluar.*, jenis.nama_jenis")->join('jenis', 'jenis.id=surat_keluar.id_jenis')->findAll();
        return $this->respond($data);
    }

    public function post()
    {
        $item = $this->request->getJSON();
        try {
            $this->conn->transException(true)->transStart();
            $item->file = isset($item->berkas) ? $this->Lib->decodebase64($item->berkas->base64) : null;
            $this->keluar->insert($item);
            $item->id = $this->keluar->getInsertID();
            $this->conn->transComplete();
        } catch (DatabaseException $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function put()
    {
        $item = $this->request->getJSON();
        try {
            $this->conn->transException(true)->transStart();
            $item->file = isset($item->berkas) ? $this->Lib->decodebase64($item->berkas->base64) : $item->file;
            $this->keluar->update($item->id, $item);
            $this->conn->transComplete();
        } catch (DatabaseException $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function delete($id = null)
    {
        try {
            $this->keluar->delete($id);
            return redirect()->to(base_url('masuk'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
