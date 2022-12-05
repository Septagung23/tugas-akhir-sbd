<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supp extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $guarded = [];
    public $timestamps = false;
}