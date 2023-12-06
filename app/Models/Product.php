<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $connection = 'mongodb';

    protected  $fillable = [
        'codigo',
        'nome', 
        'quantidadeEstoque', 
        'valorUnitario', 
        'valorUnitarioComDesconto', 
        'unidadeMedida',
    ];

    protected $append = [
        'ValorUnitarioFormat',
        'valorUnitarioComDescontoFormat'
    ];

    protected $indexes = [
        [
            'key' => [
                'codigo' => 1,
            ],
        ],
    ];

    function getValorUnitarioFormatAttribute(){
        return 'R$ '.number_format($this->valorUnitario, 2, ',', '.');
    }

    function getvalorUnitarioComDescontoFormatAttribute(){
        return 'R$ '.number_format($this->valorUnitarioComDesconto, 2, ',', '.');
    }
}



