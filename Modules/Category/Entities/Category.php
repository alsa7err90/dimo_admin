<?php

namespace Modules\Category\Entities;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,Loggable;

    protected $fillable = ['parent_id', 'name','slug','icon','content','status'];

  public function children()
  {
    return $this->hasMany(Category::class, 'parent_id');
  }
  public function subcategory()
  {
      return $this->hasMany(Category::class, 'parent_id');
  }
    protected static function newFactory()
    {
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }

}
