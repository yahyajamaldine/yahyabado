<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;


class file_tanfidi extends Model
{
    protected $table="file_tanfidi";

    public $incrementing = false;


     /******The ramz property is going to contains 3 pieces of infos */
     protected $casts = [
        'ramz' =>  'array',
        'Flist' => 'array',
    ];
    
    use HasFactory;
    
}
