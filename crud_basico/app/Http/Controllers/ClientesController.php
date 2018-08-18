<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClientesController extends Controller
{
    public function index(){
        return view('clientes.lista');
    }

    public function novo(){
        return view('clientes.formulario');
    }
}
