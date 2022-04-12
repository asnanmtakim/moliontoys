<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'team';
    protected $primaryKey = 'id_team';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name_team', 'position_team', 'image_team', 'wa_team', 'ig_team', 'fb_team',
        'created_at', 'updated_at', 'deleted_at'
    ];
}
