<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = ['name'];

    protected $table = 'roles';

    use HasFactory;
}
