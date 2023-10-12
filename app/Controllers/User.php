<?php

namespace App\Controllers;

use App\Models\UnitModel;
use App\Models\UserModel;

class User extends BaseController
{
    protected $user;
    protected $unit;
    protected $conn;
    public function __construct() {
        $this->user = new UserModel();
        $this->unit = new UnitModel();
        $this->conn = \Config\Database::connect();
    }
    public function index()
    {
        $data['title'] = "Manajemen User";
        $data['icon'] = "fa fa-user";
        return view('user', $data);
    }

    public function read()
    {
        $data['unit'] = $this->unit->findAll();
        $data['user'] = $this->user->select("user.*, unit_kerja.nama_unit_kerja")->join("unit_kerja", "user.id=unit_kerja.id_user", "LEFT")->findAll();
        return $this->respond($data);
    }
    public function post()
    {
        $item = $this->request->getJSON();
        try {
            $this->conn->transBegin();
            $item->password = password_hash($item->password, PASSWORD_DEFAULT);
            $this->user->insert($item);
            $item->id = $this->user->getInsertID();
            $this->unit->update($item->unit_kerja_id, ['id_user'=>$item->id]);
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
            $this->user->update($item->id, $item);
            return redirect()->to(base_url('user'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function delete($id = null)
    {
        try {
            $this->unit->where('id_user', $id)->update(null, ['id_user'=>null]);
            $this->user->delete($id);
            return $this->respond(true);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
