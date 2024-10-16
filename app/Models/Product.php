<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;
    protected $table = 'products';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','title','category_id','description','price','discountPercentage','stock','status','posittion','thumbnail','delete','DeleteAt'];
    protected $attributes = [
        'delete' => false
    ];
}
