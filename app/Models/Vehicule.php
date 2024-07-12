<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'immatriculation',
        'type',
        'model',
        'marque_id',
        'place_id',
        'proprietaire',
        'proprietaire_phone',
        'carburant',
        'garantie',
        'panne',
        'author_id'
    ];

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
