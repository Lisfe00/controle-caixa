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

    protected $append = [
        'valorTotalFormat',
        'valorComDescontoFormat'
    ];

    protected $indexes = [
        [
            'key' => [
                '_id' => 1,
            ],
        ],
    ];

    function getvalorTotalFormatAttribute(){
        return 'R$ '.number_format((float)$this->valorTotal, 2, ',', '.');
    }

    function getvalorComDescontoFormatAttribute(){
        return 'R$ '.number_format((float)$this->valorComDesconto, 2, ',', '.');
    }
}
