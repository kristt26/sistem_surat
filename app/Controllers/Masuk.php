<?php

namespace App\Controllers;

use App\Libraries\Decode;
use App\Models\JenisModel;
use App\Models\SuratMasukModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Masuk extends BaseController
{
    protected $jenis;
    protected $masuk;
    protected $conn;
    protected $Lib;
    public function __construct() {
        $this->jenis = new JenisModel();
        $this->masuk = new SuratMasukModel();
        $this->conn = \Config\Database::connect();
        $this->Lib = New Decode();
    }

    public function index()
    {
        $data['title'] = "Surat Masuk";
        $data['icon'] = "fas fa-inbox";
        return view('masuk', $data);
    }

    public function read()
    {
        $data['jenis'] = $this->jenis->findAll();
        $data['masuk'] = $this->masuk->join('jenis', 'jenis.id=surat_masuk.id_jenis')->findAll();
        return $this->respond($data);
    }
    public function post()
    {
        $item = $this->request->getJSON();
        try {
            $this->conn->transException(true)->transStart();
            $item->file = isset($item->berkas) ? $this->Lib->decodebase64($item->berkas->base64) : null;
            $this->masuk->insert($item);
            $item->id = $this->masuk->getInsertID();
            $this->conn->transComplete();
        } catch (DatabaseException $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        $item = $this->request->getJSON();
        try {
            $this->masuk->update($item->id, $item);
            return redirect()->to(base_url('masuk'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete($id = null)
    {
        try {
            $this->masuk->delete($id);
            return redirect()->to(base_url('masuk'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
