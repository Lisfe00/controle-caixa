<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected  $connection = 'mongodb';

    protected  $fillable = [
        'clienteClube',
        'produtos',
        'valorTotal',
        'valorComDesconto',
        'metodoPagamento',
    ];

    protected $indexes = [
        [
            'key' => [
                '_id' => 1,
            ],
        ],
    ];
}
