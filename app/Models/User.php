<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasUuids;
    protected $table = 'usersCl';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','fullname','email','tokenUser','password','phone','avatar','status','delete'];
    protected $attributes = [
        'delete' => false
    ];
    public $timestamps = false;
}
