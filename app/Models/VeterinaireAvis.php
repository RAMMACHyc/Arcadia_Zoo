<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaireAvis extends Model
{
    use HasFactory;

    protected $table = 'veterinaire_avis';
    protected $fillable = ['animal_id', 'etat_animal', 'nourriture', 'grammage_nourriture', 'date_passage', 'detail_etat', 'user_id', 'comment'];

    

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}