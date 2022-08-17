<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainJobDescription extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug','count', 'company', 'location', 'email','tag', 'salary', 'close_date','cat_id',
    'user_id','icon', 'description','status','type','is_featured','cat_id','user_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}

