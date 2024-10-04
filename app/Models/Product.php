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
    protected $fillable = ['id','title','description','price','discountPercentage','stock','status','posittion','thumbnail','delete'];
    protected $attributes = [
        'delete' => false
    ];
}
