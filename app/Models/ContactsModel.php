<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactsModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name', 'email', 'subject', 'message', 'status', 'subject_email', 'balas', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function getAllContact()
    {
        return $this->orderBy('id', 'DESC')->find();
    }
}
