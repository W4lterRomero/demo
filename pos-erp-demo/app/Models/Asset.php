<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'quantity',
        'expected',
        'counted',
        'responsible',
        'last_audit',
    ];

    protected function casts(): array
    {
        return [
            'last_audit' => 'date',
        ];
    }
}
