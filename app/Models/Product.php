<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\NullableType;

class Product extends Model
{
    use HasUuids;
    protected $table = 'products';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','title','category_id','description','price','discountPercentage',
    'stock','status','posittion','thumbnail','delete','DeleteAt','note','partials','id_product','uses','specifications','howuse','id_unit'
    ,'id_producers','preserve'];
    protected $attributes = [
        'delete' => false
    ];
    
    public function category() {
        return $this->belongsTo('App\Models\CategoryProduct','category_id','id');
    }
    public function unit() {
        return $this->belongsTo('App\Models\unit','id_unit','id');
    }
    public function producers() {
        return $this->belongsTo('App\Models\producer','id_producers','id');
    }
}
