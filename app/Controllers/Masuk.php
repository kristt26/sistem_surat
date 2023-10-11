<?php

namespace App\Controllers;

use App\Libraries\Decode;
use App\Models\DispoModel;
use App\Models\JenisModel;
use App\Models\SuratMasukModel;
use App\Models\UnitModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Masuk extends BaseController
{
    protected $jenis;
    protected $masuk;
    protected $disposisi;
    protected $unit;
    protected $conn;
    protected $Lib;
    public function __construct() {
        $this->jenis = new JenisModel();
        $this->masuk = new SuratMasukModel();
        $this->disposisi = new DispoModel();
        $this->unit = new UnitModel();
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
        $data['unit'] = $this->unit->findAll();
        $data['masuk'] = $this->masuk->select("surat_masuk.*, jenis.nama_jenis")->join('jenis', 'jenis.id=surat_masuk.id_jenis')->findAll();
        foreach ($data['masuk'] as $key => $value) {
            $data['masuk'][$key]['disposisi'] = $this->disposisi->where("surat_masuk_id", $value['id'])->findAll();
        }
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

    public function dispo()
    {
        $item = $this->request->getJSON();
        $data = [];
        try {
            $this->conn->transException(true)->transStart();
            foreach ($item->unit as $key => $value) {
                $itemm = [
                    "isi_disposisi"=>$item->isi_disposisi,
                    "unit_kerja_id" => $value->id,
                    "surat_masuk_id" => $item->surat_masuk_id
                ];
                $this->disposisi->insert($itemm);
                $itemm['id'] = $this->disposisi->getInsertID();
                $data[] = $itemm;
            }
            $this->conn->transComplete();
            return $this->respond($data);
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
            $this->masuk->update($item->id, $item);
            $this->conn->transComplete();
        } catch (DatabaseException $th) {
            return $this->fail($th->getMessage());
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
