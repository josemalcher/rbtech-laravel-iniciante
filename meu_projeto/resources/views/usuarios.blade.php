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
<br>
@foreach($usuarios as $usuario)
    {{$usuario}} <br>
@endforeach
