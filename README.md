# Laravel para iniciantes

http://dev.rbtech.info/laravel-iniciantes-introducao/

---

## <a name="indice">Índice</a>

- [Introdução](#parte1)   
- [Artisan](#parte2)   
- [Routes](#parte3)   
- [Controllers, Views e Blade](#parte4)   
- [Banco de dados e Migrations](#parte5)   
- [Eloquent e Model](#parte6)   
- [CRUD parte 1](#parte7)   
- [CRUD parte 2](#parte8)   
- [CRUD parte 3](#parte9)   
- [CRUD parte 4](#parte10)   



---

## <a name="parte1">Introdução</a>

- http://dev.rbtech.info/laravel-iniciantes-introducao/

```
    composer create-project laravel/laravel meu_projeto 5.2.x-dev
```

[Voltar ao Índice](#indice)

---

## <a name="parte2">Artisan</a>

- php artisan list

```
λ php artisan list
Laravel Framework version 5.2.45

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under.
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  clear-compiled      Remove the compiled class file
  down                Put the application into maintenance mode
  env                 Display the current framework environment
  help                Displays help for a command
  list                Lists commands
  migrate             Run the database migrations
  optimize            Optimize the framework for better performance
  serve               Serve the application on the PHP development server
  tinker              Interact with your application
  up                  Bring the application out of maintenance mode
 app
  app:name            Set the application namespace
 auth
  auth:clear-resets   Flush expired password reset tokens
 cache
  cache:clear         Flush the application cache
  cache:table         Create a migration for the cache database table
 config
  config:cache        Create a cache file for faster configuration loading
  config:clear        Remove the configuration cache file
 db
  db:seed             Seed the database with records
 event
  event:generate      Generate the missing events and listeners based on registration
 key
  key:generate        Set the application key
 make
  make:auth           Scaffold basic login and registration views and routes
  make:console        Create a new Artisan command
  make:controller     Create a new controller class
  make:event          Create a new event class
  make:job            Create a new job class
  make:listener       Create a new event listener class
  make:middleware     Create a new middleware class
  make:migration      Create a new migration file
  make:model          Create a new Eloquent model class
  make:policy         Create a new policy class
  make:provider       Create a new service provider class
  make:request        Create a new form request class
  make:seeder         Create a new seeder class
  make:test           Create a new test class
 migrate
  migrate:install     Create the migration repository
  migrate:refresh     Reset and re-run all migrations
  migrate:reset       Rollback all database migrations
  migrate:rollback    Rollback the last database migration
  migrate:status      Show the status of each migration
 queue
  queue:failed        List all of the failed queue jobs
  queue:failed-table  Create a migration for the failed queue jobs database table
  queue:flush         Flush all of the failed queue jobs
  queue:forget        Delete a failed queue job
  queue:listen        Listen to a given queue
  queue:restart       Restart queue worker daemons after their current job
  queue:retry         Retry a failed queue job
  queue:table         Create a migration for the queue jobs database table
  queue:work          Process the next job on a queue
 route
  route:cache         Create a route cache file for faster route registration
  route:clear         Remove the route cache file
  route:list          List all registered routes
 schedule
  schedule:run        Run the scheduled commands
 session
  session:table       Create a migration for the session database table
 vendor
  vendor:publish      Publish any publishable assets from vendor packages
 view
  view:clear          Clear all compiled view files
```

- php artisan help make:controller

```
λ php artisan help make:controller
Usage:
  make:controller [options] [--] <name>

Arguments:
  name                  The name of the class

Options:
      --resource        Generate a resource controller class.
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display trouthis application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under.
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
 Create a new controller class
```


[Voltar ao Índice](#indice)

---

## <a name="parte3">Routes</a>

- https://laravel.com/docs/5.2/routing
- https://laravel.com/docs/5.2/facades

```php
<?php
Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste', function () {
    echo "/teste";
});

// Ex:
Route::get('usuarios', 'UsuarioController@intex');

// Ex2:
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password'=> 'Auth\PasswordController'
]);

//ex3: parâmetros
Route::any('/teste/{teste}', function ($teste) {
    echo $teste;
});
// OU
Route::get('/teste/{teste}', function ($teste) {
    echo $teste;
});
```

```
λ php artisan route:list
+--------+--------------------------------+--------------------------------------------------------+------+------------------------------------------------------------+------------+
| Domain | Method                         | URI                                                    | Name | Action                                                     | Middleware |
+--------+--------------------------------+--------------------------------------------------------+------+------------------------------------------------------------+------------+
|        | GET|HEAD                       | /                                                      |      | Closure                                                    | web        |
|        | GET|HEAD                       | auth/login/{one?}/{two?}/{three?}/{four?}/{five?}      |      | App\Http\Controllers\Auth\AuthController@getLogin          | web,guest  |
|        | POST                           | auth/login/{one?}/{two?}/{three?}/{four?}/{five?}      |      | App\Http\Controllers\Auth\AuthController@postLogin         | web,guest  |
|        | GET|HEAD                       | auth/logout/{one?}/{two?}/{three?}/{four?}/{five?}     |      | App\Http\Controllers\Auth\AuthController@getLogout         | web,guest  |
|        | GET|HEAD                       | auth/register/{one?}/{two?}/{three?}/{four?}/{five?}   |      | App\Http\Controllers\Auth\AuthController@getRegister       | web,guest  |
|        | POST                           | auth/register/{one?}/{two?}/{three?}/{four?}/{five?}   |      | App\Http\Controllers\Auth\AuthController@postRegister      | web,guest  |
|        | GET|HEAD|POST|PUT|PATCH|DELETE | auth/{_missing}                                        |      | App\Http\Controllers\Auth\AuthController@missingMethod     | web,guest  |
|        | GET|HEAD                       | password/broker/{one?}/{two?}/{three?}/{four?}/{five?} |      | App\Http\Controllers\Auth\PasswordController@getBroker     | web,guest  |
|        | GET|HEAD                       | password/email/{one?}/{two?}/{three?}/{four?}/{five?}  |      | App\Http\Controllers\Auth\PasswordController@getEmail      | web,guest  |
|        | POST                           | password/email/{one?}/{two?}/{three?}/{four?}/{five?}  |      | App\Http\Controllers\Auth\PasswordController@postEmail     | web,guest  |
|        | GET|HEAD                       | password/reset/{one?}/{two?}/{three?}/{four?}/{five?}  |      | App\Http\Controllers\Auth\PasswordController@getReset      | web,guest  |
|        | POST                           | password/reset/{one?}/{two?}/{three?}/{four?}/{five?}  |      | App\Http\Controllers\Auth\PasswordController@postReset     | web,guest  |
|        | GET|HEAD|POST|PUT|PATCH|DELETE | password/{_missing}                                    |      | App\Http\Controllers\Auth\PasswordController@missingMethod | web,guest  |
|        | GET|HEAD                       | teste                                                  |      | Closure                                                    | web        |
|        | GET|HEAD                       | usuarios                                               |      | App\Http\Controllers\UsuarioController@intex               | web        |
+--------+--------------------------------+--------------------------------------------------------+------+------------------------------------------------------------+------------+

C:\Users\josemalcher\Documents\01-SERVs\xampp_php7.2.1\htdocs\rbtech-laravel-iniciante\meu_projeto (master)
```



[Voltar ao Índice](#indice)

---

## <a name="parte4">Controllers, Views e Blade</a>

```
λ php artisan make:controller UsuarioController
Controller created successfully.
```

```php
<?php
Route::controller('usuarios', 'UsuarioController');
```
```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class UsuarioController extends Controller
{
    public function index(){
       echo 'Olá mundo, Controller';
    }

    public function getIndex(){

    }

    public function postIndex(){

    }
    public function getLista(){

    }
}

```
```
λ php artisan route:list
+--------+--------------------------------+-------------------------------------------------------+------+------------------------------------------------------+------------+
| Domain | Method                         | URI                                                   | Name | Action                                               | Middleware |
+--------+--------------------------------+-------------------------------------------------------+------+------------------------------------------------------+------------+
|        | GET|HEAD                       | usuarios                                              |      | App\Http\Controllers\UsuarioController@getIndex      | web        |
|        | POST                           | usuarios                                              |      | App\Http\Controllers\UsuarioController@postIndex     | web        |
|        | GET|HEAD                       | usuarios/index/{one?}/{two?}/{three?}/{four?}/{five?} |      | App\Http\Controllers\UsuarioController@getIndex      | web        |
|        | POST                           | usuarios/index/{one?}/{two?}/{three?}/{four?}/{five?} |      | App\Http\Controllers\UsuarioController@postIndex     | web        |
|        | GET|HEAD                       | usuarios/lista/{one?}/{two?}/{three?}/{four?}/{five?} |      | App\Http\Controllers\UsuarioController@getLista      | web        |
|        | GET|HEAD|POST|PUT|PATCH|DELETE | usuarios/{_missing}                                   |      | App\Http\Controllers\UsuarioController@missingMethod | web        |
+--------+--------------------------------+-------------------------------------------------------+------+------------------------------------------------------+------------+

```

- https://laravel.com/docs/5.2/blade

- meu_projeto/app/Http/Controllers/UsuarioController.php

```php
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
}

```

- meu_projeto/resources/views/usuarios.blade.php

```php
Sem passagem: Olá da view! (normal)
Padrão: <?php echo $texto ?>
Blade: {{$texto}}

---------------------

{{$texto}}
@if($checagem == true)
    Checatem  = true
@else
    chedagem = false
@endif

@foreach($usuarios as $usuario)
    {{$usuario}} <br>
@endforeach
```


[Voltar ao Índice](#indice)

---

## <a name="parte5">Banco de dados e Migrations</a>

- https://laravel.com/docs/5.2/migrations

```
λ php artisan make:migration create_usuarios
Created Migration: 2018_08_17_212600_create_usuarios
```

Condigurações do BD:

- meu_projeto/.env

```
DB_DATABASE=rbtech_laravelbasico1
DB_USERNAME=root
DB_PASSWORD=*****
```

```
λ php artisan migrate
Migration table created successfully.
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table

```

```
λ php artisan migrate:rollback
Rolled back: 2014_10_12_100000_create_password_resets_table
Rolled back: 2014_10_12_000000_create_users_table
```

```
λ php artisan migrate
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table

λ php artisan make:migration create_clientes_table --create=clientes
Created Migration: 2018_08_17_215106_create_clientes_table
```

- meu_projeto/database/migrations/2018_08_17_215106_create_clientes_table.php

```php
 public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 60);
            $table->text('endereco');
            $table->integer('numero');
            $table->timestamps();
        });
    }
```

```
λ php artisan migrate
Migrated: 2018_08_17_215106_create_clientes_table

```

```
λ php artisan make:model Cliente
Model created successfully.
```


[Voltar ao Índice](#indice)

---

## <a name="parte6">Eloquent e Model</a>

```
λ php artisan tinker
Psy Shell v0.7.2 (PHP 7.2.1 — cli) by Justin Hileman
>>> $cliente = new App\Cliente;
=> App\Cliente {#631}
>>> $cliente;
=> App\Cliente {#631}
>>> $cliente->nome = 'Cliente 1';
=> "Cliente 1"
>>> $cliente->endereco = 'Rua tal tal';
=> "Rua tal tal"
>>> $cliente->numero = '123';
=> "123"
>>> $cliente;
=> App\Cliente {#631
     nome: "Cliente 1",
     endereco: "Rua tal tal",
     numero: "123",
   }
>>> $cliente->save();
=> true
>>> $cliente;
=> App\Cliente {#631
     nome: "Cliente 1",
     endereco: "Rua tal tal",
     numero: "123",
     updated_at: "2018-08-18 03:45:43",
     created_at: "2018-08-18 03:45:43",
     id: 1,
   }
>>>
```

```
>>> $cliente->nome = 'Cliente alterado';
=> "Cliente alterado"
>>> $cliente;
=> App\Cliente {#631
     nome: "Cliente alterado",
     endereco: "Rua tal tal",
     numero: "123",
     updated_at: "2018-08-18 03:45:43",
     created_at: "2018-08-18 03:45:43",
     id: 1,
   }
>>>
```

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'numero'
    ];
}

```

```
>>> $cliente = App\Cliente::create(['nome'=>'cliente 2', 'endereco'=>'Endereco 2', 'numero'=>'321']);
=> App\Cliente {#644
     nome: "cliente 2",
     endereco: "Endereco 2",
     numero: "321",
     updated_at: "2018-08-18 03:59:46",
     created_at: "2018-08-18 03:59:46",
     id: 2,
   }
>>>
```

```
λ php artisan tinker
Psy Shell v0.7.2 (PHP 7.2.1 — cli) by Justin Hileman
>>> $cliente2 = App\Cliente::find(2);
=> App\Cliente {#644
     id: 2,
     nome: "cliente 2",
     endereco: "Endereco 2",
     numero: 321,
     created_at: "2018-08-18 03:59:46",
     updated_at: "2018-08-18 03:59:46",
   }
>>> $cliente2 = App\Cliente::find(10);
=> null
>>> $cliente2 = App\Cliente::findOrFail(10);
Illuminate\Database\Eloquent\ModelNotFoundException with message 'No query results for model [App\Cliente].'
>>>
```

```
>>> $cliente2 = App\Cliente::find(2);
=> App\Cliente {#645
     id: 2,
     nome: "cliente 2",
     endereco: "Endereco 2",
     numero: 321,
     created_at: "2018-08-18 03:59:46",
     updated_at: "2018-08-18 03:59:46",
   }
>>> $cliente2->endereco = 'Endereco 2 Modificado';
=> "Endereco 2 Modificado"
>>> $cliente2->save();
=> true
>>> $cliente2 = App\Cliente::find(2);
=> App\Cliente {#634
     id: 2,
     nome: "cliente 2",
     endereco: "Endereco 2 Modificado",
     numero: 321,
     created_at: "2018-08-18 03:59:46",
     updated_at: "2018-08-18 04:05:48",
   }
>>>
```

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes_ativos'; // mudança de padrão
    protected $primaryKey = 'codigo_id';

    protected $fillable = [
        'nome',
        'endereco',
        'numero'
    ];
}

```

[Voltar ao Índice](#indice)

---

## <a name="parte7">CRUD parte 1</a>

```
php artisan make:auth

Created View: C:\...\crud_basico\resources/views/auth/login.blade.php
Created View: C:\...\crud_basico\resources/views/auth/register.blade.php
Created View: C:\...\crud_basico\resources/views/auth/passwords/email.blade.php
Created View: C:\...\crud_basico\resources/views/auth/passwords/reset.blade.php
Created View: C:\...\crud_basico\resources/views/auth/emails/password.blade.php
Created View: C:\...\crud_basico\resources/views/layouts/app.blade.php
Created View: C:\...\crud_basico\resources/views/home.blade.php
Created View: C:\...\crud_basico\resources/views/welcome.blade.php
Installed HomeController.
Updated Routes File.
Authentication scaffolding generated successfully!

```

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rbtech_crudbasico
DB_USERNAME=root
DB_PASSWORD=root
```

```
php artisan migrate
Migration table created successfully.
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table

```

- https://github.com/barryvdh/laravel-ide-helper

```
- composer require barryvdh/laravel-ide-helper

# config/app.php
 Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
 
- php artisan ide-helper:generate
A new helper file was written to _ide_helper.php
Unexpected no document on Illuminate\Database\Eloquent\Model
Wrote expected docblock to C:\Users\josemalcher\Documents\01-SERVs\xampp_php7.2.1\htdocs\rbtech-laravel-iniciante\crud_basico\vendor\laravel\framework\src\Illuminate\Databas
e\Eloquent\Model.php

```

```
php artisan make:controller ClientesController
Controller created successfully.

```

- crud_basico/app/Http/Controllers/ClientesController.php

```php
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

```

- crud_basico/app/Http/routes.php

```php
<?php
Route::auth();
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/clientes','ClientesController@index');
Route::get('/clientes/novo','ClientesController@novo');
```

- crud_basico/resources/views/clientes/lista.blade.php

```blade
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

```
 
[Voltar ao Índice](#indice)

---

## <a name="parte8">CRUD parte 2</a>

- https://laravelcollective.com/

- crud_basico/app/Http/Controllers/ClientesController.php

```php
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

```

- crud_basico/resources/views/clientes/formulario.blade.php

```blade
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

                        {!! Form::open(['url' => 'clientes/salvar']) !!}
                        {!! Form::label('name', "Nome") !!}
                        {!! Form::input('text', 'nome', '', ['class'=> 'form-control', 'autodocus', 'placeholder'=> 'Nome']) !!}

                        {!! Form::label('endereco', "Endereço") !!}
                        {!! Form::input('text', 'endereco', '', ['class'=> 'form-control', '', 'placeholder'=> 'Endereço']) !!}

                        {!! Form::label('numero', "Número") !!}
                        {!! Form::input('text', 'numero', '', ['class'=> 'form-control', '', 'placeholder'=> 'Número']) !!}
                        <br>
                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


```

- crud_basico/app/Http/routes.php

```php
<?php

//Route::auth();
//Route::get('/','HomeController@index');
//Route::get('/home', 'HomeController@index');
//Route::get('/clientes','ClientesController@index');
//Route::get('/clientes/novo','ClientesController@novo');

Route::get('usuarios', 'UsuariosController@index');

Route::get('clientes', 'ClientesController@index');
Route::get('clientes/novo', 'ClientesController@novo');
Route::post('clientes/salvar', 'ClientesController@salvar');

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');
    Route::auth();
    Route::get('/home', 'HomeController@index');

});

```


[Voltar ao Índice](#indice)

---

## <a name="parte9">CRUD parte 3</a>

```php
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
```

```blade
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


```

[Voltar ao Índice](#indice)

---

## <a name="parte10">CRUD parte 4</a>

```php
   public function deletar($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        \Session::flash('mensagem_sucesso', 'Cliente Deletado com sucesso');
        return Redirect::to('clientes');

    }
```

```blade
<div class="panel-body">
Listagem de Clientes
@if(Session::has('mensagem_sucesso'))
    <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
@endif
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

                {!! Form::open(['method'=> 'DELETE', 'url'=> '/clientes/'.$cliente->id, 'style'=>'display:inline']) !!}
                <button type="submit" class="btn btn-danger">Excluir</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
```

[Voltar ao Índice](#indice)

---