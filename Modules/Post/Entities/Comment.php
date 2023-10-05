<?php

namespace Modules\Post\Entities;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes,Loggable;

    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\CommentFactory::new();
    }
}
