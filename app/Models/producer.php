<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class producer extends Model
{
    use HasUuids;
    protected $table = 'producers';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','name','place'];
    public $timestamps = false;
}
