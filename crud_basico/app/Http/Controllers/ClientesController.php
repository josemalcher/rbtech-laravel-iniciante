<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Redirect;


class ClientesController extends Controller
{
    public function index()
    {
        return view('clientes.lista');
    }

    public function novo()
    {
        return view('clientes.formulario');
    }

    public function salvar(Request $request)
    {
        //var_dump($request);
        $cliente = new Cliente();

        $cliente = $cliente->create($request->all());
        //return $cliente; // retorna json

        \Session::flash('mensagem_sucesso', 'Cliente cadastrado com sucesso');


        return Redirect::to('clientes/novo');

    }
}
