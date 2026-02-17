<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotoMaintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'moto_id',
        'type',
        'scheduled_date',
        'completed_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_date' => 'date',
            'completed_at' => 'datetime',
        ];
    }

    public function moto(): BelongsTo
    {
        return $this->belongsTo(Moto::class);
    }
}
