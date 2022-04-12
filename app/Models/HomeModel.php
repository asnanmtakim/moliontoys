<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'home';
    protected $primaryKey = 'id_home';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'title_home', 'description_home', 'image_home', 'active_home', 'created_at', 'updated_at', 'deleted_at'
    ];
}
