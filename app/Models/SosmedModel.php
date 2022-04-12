<?php

namespace App\Models;

use CodeIgniter\Model;

class SosmedModel extends Model
{
    protected $table = 'sosmed';
    protected $primaryKey = 'id_sosmed';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'icon_sosmed', 'link_sosmed', 'created_at', 'updated_at', 'deleted_at'
    ];
}
