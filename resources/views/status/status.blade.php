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
             <tr>
                <td id="id_sol" style="text-align: center;"> {{ $item->solution_id }} </td>
                <td style="text-align: center;"> {{ $item->user_id }} </td>
                <td style="text-align: center;"> {{ $item->problem_id }} </td>
                <td style="text-aling: center;"> <div id="responce"></div></td>
                <td style="text-aling: center;"> {{ $item->memory}}</td>
                <td style="text-aling: center;"> {{ $item->time}}</td>
                <td style="text-aling: center;"> 
               @if($item->language=='0')

                <p>c</p>
                @else
                      @if($item->language=='1')
                        <p>c++</p>
                      @else
                          @if($item->language=='2')
                             <p>c++11</p>
                           @else
                              @if($item->language=='3')
                                    <p>java</p>
                              @endif
                           @endif
                      @endif                
                @endif
                </td>
                <td style="text-aling: center;"> {{ $item->code_lenght}}</td>
                <td style="text-aling: center;"> {{ $item->in_date}}</td>
                
             </tr>

          </tbody>
       </table>
 </body>
 <script type="text/javascript" src="{!! asset('js/jquery-2.1.1.min.js') !!}"></script>
 <script type="text/javascript">
       (function() {
        var date = document.getElementById("id_sol").innerHTML;
       // alert(date);
          $.ajax({

                url: '/status/status',
                type: 'POST',
                data: {id_sol: date},
               
                beforeSend: function() {
                   $("#responce").html('Esperando respuesta...');
                },
                error: function() {
                   $("#responce").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {

                   //respuesta
                   $("#responce").html(respuesta.msg);
                }
             });
       }).call(this);
    </script>
</html>