<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model
{
    protected $table = 'partner';
    protected $primaryKey = 'id_partner';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'title_partner', 'image_partner', 'created_at', 'updated_at', 'deleted_at'
    ];
}
