<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use HasUuids;
    protected $table = 'category_articles';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','title','parentID','description','status','posittion','thumbnail','delete'];
    protected $attributes = [
        'delete' => false
    ];
}
