<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id_about';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name_category', 'created_at', 'updated_at', 'deleted_at'
    ];
}
