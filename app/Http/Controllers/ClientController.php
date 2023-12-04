<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        return view('client');
    }

    public function create(Request $request){
        Client::create([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'sebrenome' => $request->sebrenome,
            'dataNascimento' => $request->dataNascimento,
        ]);
    }
}
