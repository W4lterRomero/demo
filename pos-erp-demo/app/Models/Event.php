<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'type',
        'date',
        'guests',
        'venue',
        'deposit',
        'checklist',
        'staff',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'deposit' => 'decimal:2',
            'checklist' => 'array',
            'staff' => 'array',
        ];
    }
}
