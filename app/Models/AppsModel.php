<?php

namespace App\Models;

use CodeIgniter\Model;

class AppsModel extends Model
{
    protected $table = 'app_identity';
    protected $primaryKey = 'conf_char';
    protected $allowedFields = [
        'conf_name', 'conf_type', 'conf_value', 'conf_descryption', 'conf_order'
    ];
}
