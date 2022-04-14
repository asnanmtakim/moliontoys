<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\AboutModel;
use App\Models\SosmedModel;
use App\Models\ProductModel;
use App\Models\ImageProductModel;
use App\Models\TeamModel;
use App\Models\PartnerModel;
use App\Models\FaqModel;

class Welcome extends BaseController
{
    protected $HomeModel;
    protected $AboutModel;
    protected $SosmedModel;
    protected $ProductModel;
    protected $ImageProductModel;
    protected $TeamModel;
    protected $PartnerModel;
    protected $FaqModel;
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->AboutModel = new AboutModel();
        $this->SosmedModel = new SosmedModel();
        $this->ProductModel = new ProductModel();
        $this->ImageProductModel = new ImageProductModel();
        $this->TeamModel = new TeamModel();
        $this->PartnerModel = new PartnerModel();
        $this->FaqModel = new FaqModel();
    }

    public function index()
    {
        return redirect()->to(base_url('/'));
    }

    public function welcome()
    {
        $product = $this->ProductModel->getAllProduct();
        $data = [
            'home' => $this->HomeModel->findAll(),
            'about' => $this->AboutModel->findAll()[0],
            'sosmed' => $this->SosmedModel->where('active_sosmed', 1)->find(),
            'team' => $this->TeamModel->findAll(),
            'partner' => $this->PartnerModel->findAll(),
            'faq' => $this->FaqModel->findAll(),
            'product' => $product,
            'title' => 'Selamat Datang',
        ];
        // dd($data);
        return view('welcome/index', $data);
    }
}
