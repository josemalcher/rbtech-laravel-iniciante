@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes
                        <a class="pull-right" href="{{url('clientes/novo')}}">Novo Cliente</a>
                    </div>

                    <div class="panel-body">
                        Listagem de Clientes

                        <table class="table">
                            <thead>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->endereco}}</td>
                                    <td>{{$cliente->numero}}</td>
                                    <td>
                                        <a href="clientes/{{$cliente->id}}/editar" class="btn btn-default">Editar</a>
                                        <button class="btn btn-danger">Excluir</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
