<?php
namespace App\Models;
use CodeIgniter\Model;
class ArticleModel extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'content', 'image', 'status', 'slug', 'created_at', 'updated_at', 'category'];
    protected $useTimestamps = true;
}
