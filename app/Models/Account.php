<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasUuids;  
    protected $table = 'accounts';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','fullname','email','tokenacc','password','phone','avatar','status','delete'];
    protected $attributes = [
        'delete' => false
    ];
    public $timestamps = false;
}
