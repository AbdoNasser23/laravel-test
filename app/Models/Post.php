<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = "posts";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public    $incrementing = false;
    protected $fillable = ["title","body","author","published"];
    protected $guarded = ["id"];


    public function comments ()
    {
        return $this->hasMany(Comment::class,'posts_id');
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class,"posts_tags","posts_id","tags_id");
    }
}
