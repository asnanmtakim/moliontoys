<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\AboutModel;
use App\Models\SosmedModel;
use App\Models\ProductModel;
use App\Models\ImageProductModel;
use App\Models\TeamModel;
use App\Models\PartnerModel;
use App\Models\BlogModel;
use App\Models\FaqModel;
use App\Models\CategoryModel;
use App\Models\CertificateModel;

class Welcome extends BaseController
{
    protected $HomeModel;
    protected $AboutModel;
    protected $SosmedModel;
    protected $ProductModel;
    protected $ImageProductModel;
    protected $TeamModel;
    protected $PartnerModel;
    protected $BlogModel;
    protected $FaqModel;
    protected $CategoryModel;
    protected $CertificateModel;
    public function __construct()
    {
        $this->HomeModel = new HomeModel();
        $this->AboutModel = new AboutModel();
        $this->SosmedModel = new SosmedModel();
        $this->ProductModel = new ProductModel();
        $this->ImageProductModel = new ImageProductModel();
        $this->TeamModel = new TeamModel();
        $this->PartnerModel = new PartnerModel();
        $this->BlogModel = new BlogModel();
        $this->FaqModel = new FaqModel();
        $this->CategoryModel = new CategoryModel();
        $this->CertificateModel = new CertificateModel();
    }

    public function index()
    {
        return redirect()->to(base_url('/'));
    }

    public function welcome()
    {
        $product = $this->ProductModel->getAllProduct();
        $blog = $this->BlogModel->getAllBlog(3);
        $data = [
            'home' => $this->HomeModel->findAll(),
            'about' => $this->AboutModel->findAll()[0],
            'sosmed' => $this->SosmedModel->where('active_sosmed', 1)->find(),
            'team' => $this->TeamModel->findAll(),
            'partner' => $this->PartnerModel->findAll(),
            'faq' => $this->FaqModel->findAll(),
            'certificate' => $this->CertificateModel->findAll(),
            'product' => $product,
            'blog' => $blog,
            'page' => 'home',
            'title' => 'Selamat Datang',
        ];
        // dd($data);
        return view('welcome/index', $data);
    }

    public function product($slug)
    {
        $product = $this->ProductModel->getOneProductbySlug($slug);
        if (empty($product)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan.');
        }
        $data = [
            'sosmed' => $this->SosmedModel->where('active_sosmed', 1)->find(),
            'product' => $product,
            'page' => 'product',
            'title' => 'Detail Produk',
        ];
        // dd($data);
        return view('welcome/product', $data);
    }

    public function blog($slug = null)
    {
        if ($slug == null) {
            $blog = $this->BlogModel->getAllBlog();
            $data = [
                'sosmed' => $this->SosmedModel->where('active_sosmed', 1)->find(),
                'blog' => $blog->paginate(4, 'blog'),
                'pager' => $this->BlogModel->pager,
                'category' => $this->CategoryModel->countCategory(),
                'recent_blog' => $this->BlogModel->getRecentBlog(5),
                'page' => 'blog',
                'title' => 'Blog',
            ];
            // dd($data);
            return view('welcome/blog', $data);
        } else {
            $blog = $this->BlogModel->getOneBlogbySlug($slug);
            if (empty($blog)) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Blog tidak ditemukan.');
            }
            $data = [
                'sosmed' => $this->SosmedModel->where('active_sosmed', 1)->find(),
                'blog' => $blog,
                'category' => $this->CategoryModel->countCategory(),
                'recent_blog' => $this->BlogModel->getRecentBlog(5),
                'page' => 'blog',
                'title' => 'Blog',
            ];
            // dd($data);
            return view('welcome/blog-detail', $data);
        }
    }
}
