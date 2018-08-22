<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Redirect;


class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::get();
        return view('clientes.lista', ['clientes' => $clientes]);
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

    public function editar($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.formulario', ['cliente' => $cliente]);
    }

    public function atualizar($id, Request $request)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());

        \Session::flash('mensagem_sucesso', 'Cliente Atualizado com sucesso');

        return Redirect::to('clientes/'.$cliente->id.'/editar');
    }
}
