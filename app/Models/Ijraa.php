<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijraa extends Model
{
    protected $table="Ijraa";

    /******The Flist attribute, is going to containe the name of uploaded files */
    protected $casts = [
        'Flist' => 'array',
    ];

    use HasFactory;
}
