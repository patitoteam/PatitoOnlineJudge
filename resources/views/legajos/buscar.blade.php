<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title> Buscar legajos </title>
    <style type="text/css" src="{!! asset('css/bootstrap.css') !!}" ></style>
	<script type="text/javascript" src="{!! asset('js/jquery-1.4.2.min.js') !!}"></script>

 </head>
 <body>
    <div class="container">
       <h1> Buscar legajos </h1>
       <div class="row">
          <button id="click">porfavor</button>
          <div id="respuesta" class="col-lg-5">
          </div>
       </div>
    </div>
    <script type="text/javascript">
       (function() {
          $("#click").click(function() {
             $.ajax({
                url: '/legajos/buscar',
                type: 'POST',
                //data: {legajo: $("#legajo").val()},
                success: function(respuesta) {
                   if (respuesta) {
                      $("#respuesta").html(respuesta);
                   } else {
                      $("#respuesta").html('<div> No hay ningún empleado con ese legajo. </div>');
                   }
                }
             });
             //$("#legajo").val('');
          });
       }).call(this);
    </script>
 </body>
</html>