<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Zwierzaki extends Model
{
    use HasFactory;

    protected $table = 'zwierzaki';

    protected $fillable = [
        'imię',
        'gatunek',
        'wiek',
        'img',
        'stan_zdrowia',
        'rasa',
        'opiekun_id',
        'id_klatki',
        'id_pochodzenia',
    ];

    
    protected $attributes = [
        //'opiekun_id' => null,
        //'id_klatki' => null,
        'id_pochodzenia' => null, // Ustawiamy na null, abyśmy mogli użyć metody boot
       
    ];

    // Metoda boot, która ustawia losową wartość dla pola 'opiekun_id' przed zapisaniem nowego obiektu
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($zwierzak) {
          //  $zwierzak->opiekun_id = rand(1, 6);
           // $zwierzak->id_klatki = rand(1, 6);
            $zwierzak->id_pochodzenia = rand(1, 6);
            $zwierzak->user_id = 1;
        });
    }

    public function klatki(): BelongsTo
    {
        return $this->belongsTo(Klatki::class, 'id_klatki', 'id_klatki');
    }
   
    public function opiekunowie(): BelongsTo
    {
        return $this->belongsTo(Opiekunowie::class, 'opiekun_id', 'opiekun_id');
    }

    public function pochodzenie(): BelongsTo
    {
        return $this->belongsTo(Pochodzenie::class, 'id_pochodzenia', 'id_pochodzenia');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}