<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SalesController extends Controller
{
    Public function index(){
        return view('sales');
    }

    public function create(Request $request){
        Sale::create([
            
            'clienteClube' => '03143493089',
            'produtos' => [
                [
                    'codigo' => '656cd6092bebc005e9083adc',
                    'quantidade' => 4
                ],
            ], 
            'valorTotal' => 25,00,
            'valorComDesconto' => 20,00,
            'metodoPagamento' => 'DINHEIRO',
        ]);
    }

    public function list(){
        $sale = Sale::first();

        echo $sale->clienteClube;
    }
}
