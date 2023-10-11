<?php

namespace App\Controllers;

use App\Models\JenisModel;

class Jenis extends BaseController
{
    protected $jenis;
    protected $conn;
    public function __construct() {
        $this->jenis = new JenisModel();
        $this->conn = \Config\Database::connect();
    }
    public function index()
    {
        $data['title'] = "Jenis Surat";
        $data['icon'] = "fas fa-mail-bulk";
        return view('jenis', $data);
    }

    public function read()
    {
        $data = $this->jenis->findAll();
        return $this->respond($data);
    }
    public function post()
    {
        $item = $this->request->getJSON();
        try {
            $this->conn->transBegin();
            $this->jenis->insert($item);
            $item->id = $this->jenis->getInsertID();
            if($this->conn->transStatus()){
                $this->conn->transCommit();
                return $this->respond($item);
            }else throw new \Exception("Gagal simpan", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        $item = $this->request->getJSON();
        try {
            $this->jenis->update($item->id, $item);
            return redirect()->to(base_url('jenis'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete($id = null)
    {
        try {
            $this->jenis->delete($id);
            return redirect()->to(base_url('jenis'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
