<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    //set attribute
    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }
    // post user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //many to many
    public function categories(){
       return $this->belongsToMany(Category::class);
    }


}
