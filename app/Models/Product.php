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
        'guid', 
        'first_name', 
        'family_name', 
        'email', 
        'address'
    ];
}
