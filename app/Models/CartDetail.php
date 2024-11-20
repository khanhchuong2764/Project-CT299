<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasUuids;  
    protected $table = 'cart_details';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','cartID','productId','quantity'];


    public function cartproduct() {
        return $this->belongsTo('App\Models\Product','productId','id');
    }
}
