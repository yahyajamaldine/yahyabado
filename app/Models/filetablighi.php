<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filetablighi extends Model
{
    protected $table="filetablighi";

    /******The ramz property is going to contains 3 pieces of infos */
    protected $casts = [
        'ramz' => 'array',
    ];

    use HasFactory;
}
