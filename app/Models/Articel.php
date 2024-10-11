<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Articel extends Model
{
    use HasUuids;   
    protected $table = 'articels';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','title','categoryarticle_id','description','content','status','posittion','thumbnail','delete','DeleteAt'];
    protected $attributes = [
        'delete' => false
    ];
}
