<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Buscar legajos </title>


  <script type="text/javascript" src="{!! asset('js/jquery-1.11.0.min.js') !!}"></script>
  <style type="text/css" src="css/bootstrap.css"></style>
  <style type="text/css" media="screen">
    body {
      overflow: hidden;
    }
    #submit{
      position: absolute;
      top: 65%;
      left: 48%;
    }
    #editor {
      position: absolute;
      top: 10%;
      bottom: 0;
      left: 25%;
      right: 0;
      width: 50%;
      height:50%;
    }
  </style>
</head>
<body>  
  <div>
    <!--arreglar formulario -->
    <form method="POST" action="http://localhost:8000/submit/{{$id}}" accept-charset="UTF-8">
      <input name="_token" type="hidden" value="L6xEYUwx9YMefJm54mqfGB83xu1CaGMJDFlSNiJk">
      <input name="_method" type="hidden" value="post">
      <div id="problem">{{$id}}</div> <br>
      Language  
      <select id="len" name='leng'>
        <option value="0">C</option>
        <option value="1">C++</option>
        <option value="2">c++11</option>
        <option value="3">java</option>
      </select>
      <label for="editor">Editor</label>
      <textarea name="editor" cols="50" rows="10" id="editor">
      </textarea>
      <div id="submit">
        <input type="submit" value="enviar">
      </div>
    </form>
  </div>
  <div id="respuesta"></div>
  <script type="text/javascript" src="{!! asset('editor/js/ace.js') !!}"></script>
  <script>
    var editor = ace.edit("");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/c_cpp");
  </script>
</body>
</html>
