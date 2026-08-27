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
    protected $fillable = ["title","body","author","published","user_id"];
    protected $guarded = ["id"];


    public function comments ()
    {
        return $this->hasMany(Comment::class,'posts_id');
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class,"posts_tags","posts_id","tags_id");
    }

    public function user()
        {
            return $this->belongsTo(User::class,'user_id');
        }

}
