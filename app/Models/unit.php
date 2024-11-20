<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasUuids;
    protected $table = 'units';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','title'];
    public $timestamps = false;
}
