<?php

namespace App\Controllers;

use App\Models\UnitModel;

class Unit extends BaseController
{
    protected $unit;
    protected $conn;
    public function __construct() {
        $this->unit = new UnitModel();
        $this->conn = \Config\Database::connect();
    }
    public function index()
    {
        $data['title'] = "Unit Kerja";
        $data['icon'] = "fa fa-universal-access";
        return view('unit', $data);
    }

    public function read()
    {
        $data = $this->unit->findAll();
        return $this->respond($data);
    }
    public function post()
    {
        $item = $this->request->getJSON();
        try {
            $this->conn->transBegin();
            $this->unit->insert($item);
            $item->id = $this->unit->getInsertID();
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
            $this->unit->update($item->id, $item);
            return redirect()->to(base_url('unit'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete($id = null)
    {
        try {
            $this->unit->delete($id);
            return redirect()->to(base_url('unit'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
