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

    public function show_sales(){
        $sales = Sale::all();

        $sales->transform(function ($sale) {
            $sale->produtos = collect($sale->produtos)->map(function ($produto) {
                $produto['nome'] = Product::where('codigo', $produto['codigo'])->first()->nome;
                $produto['unidadeMedida'] = Product::where('codigo', $produto['codigo'])->first()->unidadeMedida;
                return $produto;
            });

            if($sale->clienteClube != null){
                $nomeCLiente = Client::where('cpf', $sale->clienteClube)->first();
                $sale->nomeCliente = $nomeCLiente->nome.' '.$nomeCLiente->sobrenome;
            }else{
                $sale->nomeCliente = null;
            }
            return $sale;
        }); 
        return view('list-sales', ['sales' => $sales]);
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

        $valor = 'R$ '.number_format($valor, 2, ',', '.');
        $valorCDesc = 'R$ '.number_format($valorCDesc, 2, ',', '.');
        
        return compact('valor', 'valorCDesc');
    }

}
