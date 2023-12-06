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

    function getvalorTotalFormatAttribute(){
        return 'R$ '.number_format($this->valorTotal, 2, ',', '.');
    }

    function getvalorComDescontoFormatAttribute(){
        return 'R$ '.number_format($this->valorComDesconto, 2, ',', '.');
    }
}
