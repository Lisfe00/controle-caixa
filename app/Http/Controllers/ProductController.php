<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('product', ['products' => $products]);
    }

    public function create(Request $request){

        Product::create(
        [
            'codigo' => $request->codigo, 
            'nome' => $request->nome, 
            'quantidadeEstoque' => $request->quantidadeEstoque, 
            'valorUnitario' => $request->valorUnitario, 
            'valorUnitarioComDesconto' => $request->valorUnitarioComDesconto, 
            'unidadeMedida' => $request->unidadeMedida,
        ]);

        return redirect('create/product');
    }

    public function update(Request $request){

        return Product::where('_id', $request->id)->update([
            'codigo' => $request->codigo,
            'nome' => $request->nome, 
            'quantidadeEstoque' => $request->quantidadeEstoque, 
            'valorUnitario' => $request->valorUnitario, 
            'valorUnitarioComDesconto' => $request->valorUnitarioComDesconto, 
            'unidadeMedida' => $request->unidadeMedida,
        ]); 
    }

    public function get_product($id){

        return Product::where('_id', $id)->first();
    }

    public function delete($id){

        return Product::where('_id', $id)->delete();
    }

}
