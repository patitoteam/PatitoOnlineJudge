<!DOCTYPE html>
<html>

<head>
    <title>Problem Create</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}" />
    <script src="{{asset('/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('/js/flat-ui.min.js')}}"></script>
    <script>


    </script>
    <script type="text/x-mathjax-config">
		MathJax.Hub.Config({ showProcessingMessages: false, tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] } });
	</script>
    <script type="text/javascript" src="{{asset('/js/MathJax/MathJax.js?config=TeX-AMS-MML_HTMLorMML')}}"></script>
    <script>
        var Preview={delay:150,preview:null,buffer:null,timeout:null,mjRunning:!1,oldText:null,Init:function(){this.preview=document.getElementById("MathPreview"),this.buffer=document.getElementById("MathBuffer")},SwapBuffers:function(){var e=this.preview,t=this.buffer;this.buffer=e,this.preview=t,e.style.visibility="hidden",e.style.position="absolute",t.style.position="",t.style.visibility=""},Update:function(){this.timeout&&clearTimeout(this.timeout),this.timeout=setTimeout(this.callback,this.delay)},CreatePreview:function(){if(Preview.timeout=null,!this.mjRunning){var e=document.getElementById("MathInput").value;e!==this.oldtext&&(this.buffer.innerHTML=this.oldtext=e,this.mjRunning=!0,MathJax.Hub.Queue(["Typeset",MathJax.Hub,this.buffer],["PreviewDone",this]))}},PreviewDone:function(){this.mjRunning=!1,this.SwapBuffers()}},Preview1={delay:150,preview:null,buffer:null,timeout:null,mjRunning:!1,oldText:null,Init:function(){this.preview=document.getElementById("MathPreview1"),this.buffer=document.getElementById("MathBuffer1")},SwapBuffers:function(){var e=this.preview,t=this.buffer;this.buffer=e,this.preview=t,e.style.visibility="hidden",e.style.position="absolute",t.style.position="",t.style.visibility=""},Update:function(){this.timeout&&clearTimeout(this.timeout),this.timeout=setTimeout(this.callback,this.delay)},CreatePreview:function(){if(Preview.timeout=null,!this.mjRunning){var e=document.getElementById("MathInput1").value;e!==this.oldtext&&(this.buffer.innerHTML=this.oldtext=e,this.mjRunning=!0,MathJax.Hub.Queue(["Typeset",MathJax.Hub,this.buffer],["PreviewDone",this]))}},PreviewDone:function(){this.mjRunning=!1,this.SwapBuffers()}},Preview2={delay:150,preview:null,buffer:null,timeout:null,mjRunning:!1,oldText:null,Init:function(){this.preview=document.getElementById("MathPreview2"),this.buffer=document.getElementById("MathBuffer2")},SwapBuffers:function(){var e=this.preview,t=this.buffer;this.buffer=e,this.preview=t,e.style.visibility="hidden",e.style.position="absolute",t.style.position="",t.style.visibility=""},Update:function(){this.timeout&&clearTimeout(this.timeout),this.timeout=setTimeout(this.callback,this.delay)},CreatePreview:function(){if(Preview.timeout=null,!this.mjRunning){var e=document.getElementById("MathInput2").value;e!==this.oldtext&&(this.buffer.innerHTML=this.oldtext=e,this.mjRunning=!0,MathJax.Hub.Queue(["Typeset",MathJax.Hub,this.buffer],["PreviewDone",this]))}},PreviewDone:function(){this.mjRunning=!1,this.SwapBuffers()}};Preview.callback=MathJax.Callback(["CreatePreview",Preview]),Preview.callback.autoReset=!0,Preview1.callback=MathJax.Callback(["CreatePreview",Preview1]),Preview1.callback.autoReset=!0,Preview2.callback=MathJax.Callback(["CreatePreview",Preview2]),Preview2.callback.autoReset=!0;
    </script>
    <script src="{{asset('/js/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
<div class="container">
    <div id="editor" name="editor">
        <h1>ESTo NO FUNCIONA p</h1>
        <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <script>

    </script>

    <div class="col-md-6">
        {!! Form:: open(array('action' => 'ProblemController@store', 'files' => true)) !!}
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" class="form-control">
        <label for="description">Descripción:</label>

        <textarea name="description" class="form-control" id="MathInput" onkeyup="Preview.Update()"></textarea>
        <label for="input">Input:</label>
        <textarea name="input" class="form-control" id="MathInput1" onkeyup="Preview1.Update()"></textarea>
        <label for="output">Output:</label>
        <textarea name="output" class="form-control" id="MathInput2" onkeyup="Preview2.Update()"></textarea>
        <label for="MathInput3">Ejemplo de Entrada:</label>
        {!!Form::textarea('inputsample', '', array('id'=>'MathInput3','class'=>'form-control'))!!}
        <label for="MathInput4">Ejemplo de Salida:</label>
        {!!Form::textarea('outputsample', '', array('id'=>'MathInput4','class'=>'form-control'))!!}

        <label for="inputfile">Archivo De entrada:</label>
        {!!Form::file('inputfile', array('id'=>'inputfile')) !!}
        <label for="outputfile">Archivo De Salida:</label>
        {!!Form::file('outputfile', array('id'=>'outputfile')) !!}

        <input type="hidden" id="tags2" name="tags2"/>
        <select name="tags" id="tags1" data-toggle="select" multiple class="form-control multiselect multiselect-default mrs mbm">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>


        {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
        {!! Form:: close() !!}


        <!--<form action="/problems/guardar" class="form form-horizontal">
            <label for="title">Title:</label>
            <input type="text" id="title" class="form-control">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="MathInput" onkeyup="Preview.Update()"></textarea>
            <label for="input">Input:</label>
    <textarea class="form-control" id="MathInput1" onkeyup="Preview1.Update()"></textarea>
            <label for="output">Output:</label>
            <textarea class="form-control" id="MathInput2" onkeyup="Preview2.Update()"></textarea>
            <label for="output">Ejmplo de Entrada:</label>
            <textarea class="form-control" id="MathInput3"></textarea>
            <label for="output">Ejemplo de salida:</label>
            <textarea class="form-control" id="MathInput4"></textarea>
            <label for="">Archivo De entrada:</label>
            <input type="file" class="" name="" value="" placeholder="">
            <label for="">Archivo De Salida:</label>
            <input type="file" class="" name="" value="" placeholder="">
            <button type="submit">Enviar</button>
        </form>-->
    </div>
    <div class="col-md-6">
        <h2>Preview</h2>
        <hr>
        <h3 id="previewtitle"></h3>
        <h4>Descripcion</h4>
        <div id="MathPreview"></div>
        <div id="MathBuffer" style="visibility:hidden; position:absolute; top:0; left: 0"></div>
        <h4>Input</h4>
        <div id="MathPreview1"></div>
        <div id="MathBuffer1" style="visibility:hidden; position:absolute; top:0; left: 0"></div>
        <h4>Output</h4>
        <div id="MathPreview2"></div>
        <div id="MathBuffer2" style="visibility:hidden; position:absolute; top:0; left: 0"></div>
        <h4>Ejemplo de Entrada</h4>
        <pre id="MathPreview3"></pre>
        <h4>Ejemplo de Salida</h4>
        <pre id="MathPreview4"></pre>


    </div>
</div>
<br/>

<script>

    CKEDITOR.replace('editor',{
        height: 300
    } );
    $(function(){

        $('#tags1').on('change', function(){
            $('#tags2').val($(this).val());
        });

        if ($('[data-toggle="select"]').length) {
            $('[data-toggle="select"]').select2();
        }
        $('#title').keyup(function () {
            $('#previewtitle').text($(this).val());
        });
        $('#MathInput3').keyup(function () {
            $('#MathPreview3').text($(this).val());
        });
        $('#MathInput4').keyup(function () {
            $('#MathPreview4').text($(this).val());
        });
        Preview.Init();
        Preview1.Init();
        Preview2.Init();
    });

</script>


</body>

</html>

