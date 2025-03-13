<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'olx_url',
        'last_price',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'last_price' => 'decimal:2',
    ];
}
