<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\AboutModel;

class Welcome extends BaseController
{
    protected $HomeModel;
    protected $AboutModel;
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->AboutModel = new AboutModel();
    }

    public function index()
    {
        $data = [
            'home' => $this->HomeModel->findAll(),
            'about' => $this->AboutModel->findAll()[0],
            'title' => 'Selamat Datang',
        ];
        // dd($data);
        return view('welcome/index', $data);
    }

    public function setSess()
    {
        if ($this->request->getPost('sessName') != null && $this->request->getPost('sessValue') != null) {
            if ($this->request->getPost('sessValue') == '') {
                session()->remove($this->request->getPost('sessName'));
            } else {
                session()->remove($this->request->getPost('sessName'));
                session()->set($this->request->getPost('sessName'), $this->request->getPost('sessValue'));
            }
        } else {
            session()->remove($this->request->getPost('sessName'));
        }
        echo json_encode(session()->get($this->request->getPost('sessName')));
    }
}
