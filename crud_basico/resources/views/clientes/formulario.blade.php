@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastro de Clientes - Formulário
                        <a class="pull-right" href="{{url('clientes')}}">Listagem de Cliente</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($cliente, ['method'=>'PATCH', 'url'=>'clientes/'.$cliente->id]) !!}
                        @else
                            {!! Form::open(['url' => 'clientes/salvar']) !!}
                        @endif


                        {!! Form::label('name', "Nome") !!}
                        {!! Form::input('text', 'nome', null, ['class'=> 'form-control', 'autodocus', 'placeholder'=> 'Nome']) !!}

                        {!! Form::label('endereco', "Endereço") !!}
                        {!! Form::input('text', 'endereco', null, ['class'=> 'form-control', '', 'placeholder'=> 'Endereço']) !!}

                        {!! Form::label('numero', "Número") !!}
                        {!! Form::input('text', 'numero', null, ['class'=> 'form-control', '', 'placeholder'=> 'Número']) !!}
                        <br>
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

