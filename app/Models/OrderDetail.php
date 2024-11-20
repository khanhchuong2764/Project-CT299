<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasUuids;  
    protected $table = 'order_details';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','orderId','productId','quantity','price','discountPercentage'];

    public function orderproduct() {
        return $this->belongsTo('App\Models\Product','productId','id');
    }
}
