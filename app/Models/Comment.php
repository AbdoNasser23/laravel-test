<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = "comments";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public    $incrementing = false;
    protected $fillable = ['content','posts_id','user_id'];
    protected $guarded = ['id'];

    public function post ()
    {
        return $this->belongsTo(Post::class,'posts_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
