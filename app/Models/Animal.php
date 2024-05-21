<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animals';
    protected $primaryKey = 'id';
    protected $fillable = ['prenom', 'race', 'habitat_id', 'image'];

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }
}
