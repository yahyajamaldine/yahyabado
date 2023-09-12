<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahdar extends Model
{
    use HasFactory;

    protected $table="Mahdar";

    protected $primaryKey = 'id';

    public $incrementing = false;

}
