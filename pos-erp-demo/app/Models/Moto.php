<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Moto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'model',
        'status',
        'km',
        'last_service',
    ];

    protected function casts(): array
    {
        return [
            'last_service' => 'date',
        ];
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(MotoReservation::class);
    }

    public function maintenance(): HasMany
    {
        return $this->hasMany(MotoMaintenance::class);
    }
}
