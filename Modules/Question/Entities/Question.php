<?php

namespace Modules\Question\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [];
    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Question\Database\factories\QuestionFactory::new();
    }
}
