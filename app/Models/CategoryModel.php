<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name_category', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function countCategory()
    {
        $blog = new \App\Models\BlogModel();
        $category = $this->findAll();
        foreach ($category as $key => $value) {
            $category[$key]['count'] = $blog->countBlogbyCategory($value['id_category']);
        }
        return $category;
    }
}
