<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsuarioController extends Controller
{
    public function index(){
       //echo 'Olá mundo, Controller';
       return view('usuarios',[
           'texto'=>'Lista de Usuários',
           'checagem'=> false,
           'usuarios'=> ['usuario1','usuario2','usuario3', 'usuario4']
       ]);
    }
/*
    public function getIndex(){

    }

    public function postIndex(){

    }
    public function getLista(){

    }*/
}
