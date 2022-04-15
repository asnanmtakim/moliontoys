<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'slug_product', 'name_product', 'material_product', 'sold_product', 'detail_product',
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function getAllProduct()
    {
        $ImageProductModel = new ImageProductModel();
        $produk = $this->findAll();
        foreach ($produk as $key => $value) {
            $produk[$key]['image_product'] = $ImageProductModel->getImageProduct($value['id_product']);
        }
        return $produk;
    }

    public function getOneProductbySlug($slug)
    {
        $ImageProductModel = new ImageProductModel();
        $produk = $this->where('slug_product', $slug)->first();
        if ($produk) {
            $produk['image_product'] = $ImageProductModel->getImageProduct($produk['id_product']);
        }
        return $produk;
    }
}
