<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    use HasFactory;
    protected $table = 'habitats';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description', 'image'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
