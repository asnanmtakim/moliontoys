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
        'slug_blog', 'title_blog', 'date_blog', 'id_user_blog', 'description_blog', 'image_blog',
        'id_category', 'tag_blog', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function getAllBlog($limit = null)
    {
        if ($limit == null) {
            return $this->join('users', 'users.id = blog.id_user_blog')
                ->join('category', 'category.id_category = blog.id_category')
                ->orderBy('date_blog', 'DESC');
        } else {
            return $this->join('users', 'users.id = blog.id_user_blog')
                ->join('category', 'category.id_category = blog.id_category')
                ->limit($limit)
                ->orderBy('date_blog', 'DESC')
                ->find();
        }
    }

    public function getRecentBlog($limit)
    {
        return $this->limit($limit)
            ->orderBy('date_blog', 'DESC')
            ->find();
    }

    public function getOneBlogbySlug($slug)
    {
        return $this->join('users', 'users.id = blog.id_user_blog')
            ->join('category', 'category.id_category = blog.id_category')
            ->where('slug_blog', $slug)
            ->first();
    }

    public function countBlogbyCategory($category)
    {
        return $this->where('blog.id_category', $category)
            ->countAllResults();
    }
}
