<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotoReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'moto_id',
        'client_name',
        'phone',
        'date',
        'time_start',
        'time_end',
        'deposit',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'deposit' => 'decimal:2',
        ];
    }

    public function moto(): BelongsTo
    {
        return $this->belongsTo(Moto::class);
    }
}
