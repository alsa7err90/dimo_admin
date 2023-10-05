<?php

namespace Modules\Post\Entities;

use App\Models\User;
use App\Traits\FilterTrait;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes,Loggable ,FilterTrait ;

    protected $fillable = [];
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
        'keywords' => 'json',
        'gallery' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query){
        return $query->whereNotNull('published_at');
    }

    public function scopeGetData($query){
        return $query->when(
            !isUserAdmin(),
            function ($q){return $q->where('user_id',auth()->user()->id);}
        );
    }
}
