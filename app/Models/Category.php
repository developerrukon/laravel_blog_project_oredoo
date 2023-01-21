<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    //sub catagories relationship
    public function subCatagories(){
        return $this->hasMany(Category::class, 'parent_id')->whereNotNull('parent_id');
    }
    //one to many relationship
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
