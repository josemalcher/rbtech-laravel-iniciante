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

## <a name="parte6"></a>


[Voltar ao Índice](#indice)

---

## <a name="parte7"></a>


[Voltar ao Índice](#indice)

---

## <a name="parte8"></a>


[Voltar ao Índice](#indice)

---

## <a name="parte9"></a>


[Voltar ao Índice](#indice)

---

## <a name="parte10"></a>


[Voltar ao Índice](#indice)

---

## <a name="parte11"></a>


[Voltar ao Índice](#indice)

---

## <a name="parte12"></a>


[Voltar ao Índice](#indice)

---