<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{$problem->id}} :: {{$problem->name}}</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <script type="text/javascript" src="{{asset('/js/MathJax/MathJax.js?config=TeX-AMS-MML_HTMLorMML')}}"></script>
    <script type="text/x-mathjax-config">
		MathJax.Hub.Config({ showProcessingMessages: false, tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] } });
	</script>
</head>
<body>
<div class="container well">
    <h1>{{$problem->id}}: {{$problem->name}}</h1>

    <h3>{!! link_to('submit/'.$problem->id,'enviar') !!}</h3>
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

</div>
</body>
</html>