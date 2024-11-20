<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasUuids;  
    protected $table = 'carts';
    protected $guarded = ['id'];
    protected $primaryKey ='id';
    protected $fillable = ['id','user_id'];
}
