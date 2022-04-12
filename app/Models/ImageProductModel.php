<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageProductModel extends Model
{
    protected $table = 'image_product';
    protected $primaryKey = 'id_image_product';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_product', 'image', 'created_at', 'updated_at', 'deleted_at'
    ];
}
