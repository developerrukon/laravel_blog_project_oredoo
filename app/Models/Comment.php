<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replys(){
        return $this->hasMany(Comment::class, 'parent_id')->whereNotNull('parent_id');
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
