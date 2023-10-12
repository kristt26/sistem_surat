<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;
    protected $user;
    protected $unit;
    public function __construct()
    {
        $this->user = new \App\Models\UserModel();
        $this->unit = new \App\Models\UnitModel();
    }
    public function index()
    {
        if (session()->get('is_Login') == true) {
            return redirect()->to(base_url());
        } else {
            $data = $this->user->countAllResults();
            if ($data == 0) {
                $this->user->insert(['username' => 'Administrator', 'password' => password_hash('Administrator#1', PASSWORD_DEFAULT), 'role'=>'Admin']);
            }
            return view('auth');
        }
    }

    public function check()
    {
        try {
            $data = $this->request->getJSON();
            $query = $this->user->where(['username' => $data->username])->first();
            if ($query != '') {
                    if (password_verify($data->password, $query['password'])) {
                        if ($query['role']=='Admin') {
                            $session = [
                                'uid'         => $query['id'],
                                'level'  => $query['role'],
                                'name'  => 'Admin',
                                'is_Login'  => TRUE
                            ];
                            session()->set($session);
                        } else {
                            $user = $this->unit->where('id_user', $query['id'])->first();
                            $session = [
                                'uid'         => $query['id'],
                                'level'  => $query['role'],
                                'name'  => $user['nama_unit_kerja'],
                                'is_Login'  => TRUE
                            ];
                            session()->set($session);
                        }
                        return $this->respond($query);
                    } else {
                        return $this->failUnauthorized("Password salah");
                    }
                    return $this->respond($query);
            
            } else {
                return $this->failNotFound('Akun tidak terdaftar');
            }
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function logout()
    {
        // logger('logout', session()->get(), 'logout');
        session()->destroy();
        unset($_COOKIE['purple-free-banner']);
        // setcookie('purple-free-banner', null, -1, '/');
        return redirect()->to(base_url('auth'));
    }

    public function check_session()
    {
        return $this->respond(session()->get('is_Login') == FALSE ? 0 : 1);
    }

    public function change_password()
    {
        $param = $this->request->getJSON();
        $data = $this->user->find(session()->get("uid"));
        if (password_verify($param->passwordLama, $data['password']) == false) {
            return $this->fail("Password lama salah");
        } else {
            $this->user->update(session()->get("uid"), ['password' => password_hash($param->passwordBaru, PASSWORD_DEFAULT)]);
            return $this->respond("Update password berhasil");
        }
    }
}
