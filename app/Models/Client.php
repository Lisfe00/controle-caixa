<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected  $connection = 'mongodb';

    protected  $fillable = [
        'cpf',
        'nome',
        'sobrenome',
        'dataNascimento',
        'telefone'
    ];

    protected $append = [
        'formatedCpf',
    ];

    protected $indexes = [
        [
            'key' => [
                'cpf' => 1,
            ],
        ],
    ];

    function getformatedCpfAttribute()
    {
        if (! $this->cpf) {
            return '';            
        }
        if (strlen($this->cpf) == 11) {
            return substr($this->cpf, 0, 3) . '.' . substr($this->cpf, 3, 3) . '.' . substr($this->cpf, 6, 3) . '-' . substr($this->cpf, 9);
        }
        return $this->cpf;
    }
}
