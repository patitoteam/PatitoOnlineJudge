<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>

  <style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
    #submit{
      position: absolute;
      top: 60%;
      left: 48%;
    }
    #editor {
        /*margin: 0;*/
        position: absolute;
        top: 6%;
        bottom: 0;
        left: 25%;
        right: 0;
        width: 50%;
        height:50%;
    }
  </style>
</head>
<body>
<!--form-->
<div style="text-align: center;">
    Problem 1000<br>
    Language  
     <select>
      <option value="c++">c++</option>
      <option value="java">java</option>
      <option value="c">C</option>
      <option value="pascal">pascal</option>
     </select>
</div>  
<form>
  
  <pre id="editor" >
  </pre>
  <div id="submit">
  <input type="submit" value="Enviar"/>
  </div>
</form>   
<script type="text/javascript" src="{!! asset('editor/js/ace.js') !!}"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/c_cpp");
    
</script>



</body>
</html>
