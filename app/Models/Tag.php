<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUuids;

    protected $table = "tags";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public    $incrementing = false;
    protected $fillable = ["title"];
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class,"posts_tags","tags_id","posts_id");
    }
}
