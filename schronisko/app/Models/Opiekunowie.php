<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opiekunowie extends Model
{
    use HasFactory;
    
    protected $table = 'opiekunowie';
    
    public function zwierzaki(): HasMany
    {
        return $this->hasMany(Zwierzaki::class);
    }
}
