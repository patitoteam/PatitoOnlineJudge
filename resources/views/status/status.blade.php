<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Status </title>
 </head>
 <body>
 <div style="text-align: center;">
 Problem id  <input type="text" />
 User  <input type="text" />
 Language  
 <select>
  <option value="c++">c++</option>
  <option value="java">java</option>
  <option value="c">C</option>
  <option value="pascal">pascal</option>

 </select>
 Result
<select>
  <option value="ALL">ALL</option>
  <option value="AC">AC</option>
  <option value="WA">WA</option>
  <option value="TLE">TLE</option>
  <option value="MLE">MLE</option>
  <option value="OLE">OLE</option>
  <option value="RE">RE</option>
  <option value="">.....</option>

</select>
</div>
    @if($status->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 15%; border-bottom: solid 1px #000;">RunID</th>
             <th style="width: 15%; border-bottom: solid 1px #000;">User</th>
             <th style="width: 15%; border-bottom: solid 1px #000;">Problem</th>
             <th style="width: 15%; border-bottom: solid 1px #000;"> Result </th>
             <th style="width: 15%; border-bottom: solid 1px #000;">Memory </th>
             <th style="width: 15%; border-bottom: solid 1px #000;">Time </th>
             <th style="width: 15%; border-bottom: solid 1px #000;"> Language</th>
             <th style="width: 15%; border-bottom: solid 1px #000;"> Code Length</th>
             <th style="width: 15%; border-bottom: solid 1px #000;"> Submit Time</th>
      
          </tr>
          </thead>
          <tbody>
          @foreach($status as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->solution_id }} </td>
                <td style="text-align: center;"> {{ $item->user_id }} </td>
                <td style="text-align: center;"> {{ $item->problem_id }} </td>
                <td style="text-aling: center;"> <div id="responce"></div></td>
                <td style="text-aling: center;"> {{ $item->memory}}</td>
                <td style="text-aling: center;"> {{ $item->time}}</td>
                <td style="text-aling: center;"> {{ $item->language}}</td>
                <td style="text-aling: center;"> {{ $item->code_lenght}}</td>
                <td style="text-aling: center;"> {{ $item->in_date}}</td>
                
             </tr>
          @endforeach
          </tbody>
       </table>
    @else
       <p> No se han encontrado usuarios </p>
    @endif
 </body>
 <script type="text/javascript" src="{!! asset('js/jquery-2.1.1.min.js') !!}"></script>
 <script type="text/javascript">
       (function() {
          $.ajax({

                url: '/status/status',
                type: 'POST',
               
                beforeSend: function() {
                   $("#responce").html('Buscando empleado...');
                },
                error: function() {
                   $("#responce").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {

                   //respuesta
                }
             });
       }).call(this);
    </script>
</html>