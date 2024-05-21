<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alimentation_quotidienne extends Model
{
    use HasFactory;

    protected $table = 'alimentation_quotidienne';
    protected $fillable = ['animal_id', 'user_id', 'date_alimentation', 'heure_alimentation', 'type_nourriture', 'quantite_nourriture'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
