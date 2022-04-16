<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificateModel extends Model
{
    protected $table = 'certificate';
    protected $primaryKey = 'id_certificate';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'icon_certificate', 'title_certificate', 'description_certificate', 'file_certificate', 'created_at', 'updated_at', 'deleted_at'
    ];
}
