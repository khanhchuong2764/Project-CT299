<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasUuids;  
    protected $table = 'orders';
    protected $guarded = [];
    protected $primaryKey ='id';
    protected $fillable = ['id','userId','cartID','fullname','phone','address'];
    
}
