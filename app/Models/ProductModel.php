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
}