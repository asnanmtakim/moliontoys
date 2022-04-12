<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'slug_blog', 'title_blog', 'id_user_blog', 'description_blog', 'image_blog',
        'id_category', 'tag_blog', 'created_at', 'updated_at', 'deleted_at'
    ];
}
