<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class SalesController extends Controller
{
    Public function index(){
        $vendas = Sale::get()->count();
        return view('sales', ['vendas' => $vendas]);
    }

    public function create(Request $request){
         Sale::create([
            'clienteClube' => $request->clienteClube,
            'produtos' => json_decode($request->products, true),
            'valorTotal' => $request->valorTotal,
            'valorComDesconto' => $request->valorComDeconto,
            'metodoPagamento' => $request->pagamento,
        ]);

        foreach(json_decode($request->products, true) as $product){
            $produto =Product::where('codigo', $product['codigo'])->first();
            $produto = $produto->quantidadeEstoque - intval($product['quantidade']);
            Product::where('codigo', $product['codigo'])->update([
                'quantidadeEstoque' => $produto
            ]);
        }

        return "ok";
    }

    public function get_product($codigo){

        $product = Product::where('codigo', $codigo)->first();

        if($product){
            return $product;
        }else{
            return 0;
        }
    }

    public function get_client($cpf){
        $client = Client::where('cpf', $cpf)->first();

        if($client){
            return $client;
        }else{
            return 0;
        }
    }

    public function get_value(Request $request){
        $datas = json_decode($request->getContent(), true);
        $valor = 0;
        $valorCDesc = 0;

        foreach($datas as $data){
            $product = Product::where('codigo', $data['codigo'])->first();
            $valor += $data['quantidade'] * $product->valorUnitario;
            $valorCDesc += $data['quantidade'] * $product->valorUnitarioComDesconto;
        }

        return compact('valor', 'valorCDesc');
    }

}
