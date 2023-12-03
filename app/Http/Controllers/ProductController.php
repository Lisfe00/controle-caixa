<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('product_create');
    }

    public function create(Request $request){
        Product::create(
        [
            'nome' => $request->nome, 
            'quantidadeEstoque' => $request->quantidadeEstoque, 
            'valorUnitario' => $request->valorUnitario, 
            'unidadeMedida' => $request->unidadeMedida,
        ]);

        return view('sails');
    }

    public function list(){
        dd(Product::all());
    }
}
