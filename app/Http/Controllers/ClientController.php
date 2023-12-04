<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index(){

        $clients = Client::all();
        return view('client', ['clients' => $clients]);
    }

    public function create(Request $request){
        Client::create([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'dataNascimento' => $request->dataNascimento,
            'telefone' => $request->telefone,
        ]);

        return redirect('create/client');
    }

    public function get_client($id){
        return Client::where('_id', $id)->first();
    }

    public function update(Request $request){

        return Client::where('_id', $request->id)->update([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'dataNascimento' => $request->dataNascimento,
            'telefone' => $request->telefone,
        ]);
    }

    public function delete($id){

        return Client::where('_id', $id)->delete();
    }
}
