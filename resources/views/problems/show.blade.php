<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{$problem->id}} :: {{$problem->name}}</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
</head>
<body>
<div class="container well">
    <h1>{{$problem->id}}: {{$problem->name}}</h1>

    <h3>{!! link_to('submit/submit/'.$problem->id,'enviar') !!}</h3>
    <h3>Descripción</h3>
    <p>{{$problem->description}}</p>
    <h3>Entrada</h3>
    <p>{{$problem->input}}</p>
    <h3>Salida</h3>
    <p>{{$problem->output}}</p>
    <hr/>
    <h3>Ejemplo de Entrada</h3>
    <pre>{{$problem->sample_input}}</pre>
    <h3>Ejemplo de Salida</h3>
    <pre>{{$problem->sample_output}}</pre>
    <div class="col-md-6 text-right">
        {!! Form::open([
        'method' => 'DELETE',
        'route' => ['problems.destroy', $problem->id]
        ]) !!}
        {!! Form::submit('Eliminar Problema?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
</body>
</html>