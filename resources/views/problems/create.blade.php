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
            {!!Form::label('time_limit','Tiempo límite')!!}
            <div class="input-group col-sm-3">
                {!!Form::number('time_limit','1',array('id'=>'time_limit','class'=>'form-control','placeholder'=>'Tiempo limite' ))!!}
                <span class="input-group-addon">seg</span>
            </div>
            {!!Form::label('memory_limit','Memoria')!!}
            <div class="input-group col-sm-3">
                {!!Form::number('memory_limit','128',array('id'=>'memory','class'=>'form-control','placeholder'=>'Memoria'))!!}
                <span class="input-group-addon">Mb</span>
            </div>
            <label>Etiquetas</label>
            <br>
            <input type="hidden" id="tags2" name="tags2"/>
            <select name="tags" id="tags1" data-toggle="select" multiple placeholder="Seleccione las etiquetas" class="form-control multiselect multiselect-default mrs mbm">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
            </select>
        <br>

        {!!Form::label('name', 'Nombre')!!}
        {!!Form::text('name', '',array('id'=>'name','class'=>'form-control','placeholder'=>'Nombre del Problema'))!!}

        {!!Form::label('description', 'Descripción')!!}
        {!!Form::textarea('description','',array('id'=>'MathInput','class'=>'form-control', 'onkeyup'=>'Preview.Update()','placeholder'=>'Descripción del problema'))!!}

        {!!Form::label('input', 'Entrada')!!}
        {!!Form::textarea('input','',array('id'=>'MathInput1','class'=>'form-control', 'onkeyup'=>'Preview1.Update()','placeholder'=>'Entrada'))!!}
        {!!Form::label('output', 'Salida')!!}
        {!!Form::textarea('output','',array('id'=>'MathInput2','class'=>'form-control', 'onkeyup'=>'Preview2.Update()','placeholder'=>'Salida'))!!}

        {!!Form::label('sampleIn', 'Ejemplo de Entrada')!!}
        {!!Form::textarea('sampleIn', '', array('id'=>'sampleIn','class'=>'form-control','placeholder'=>'Ejemplo de Enrada'))!!}
        {!!Form::label('sampleOut', 'Ejemplo de Salida')!!}
        {!!Form::textarea('sampleOut', '', array('id'=>'sampleOut','class'=>'form-control','placeholder'=>'Ejemplo de Salida'))!!}

        {!!Form::label('testIn', 'Test In')!!}
        {!!Form::file('testIn', array('id'=>'testIn')) !!}
        {!!Form::label('testOut', 'Test Out')!!}
        {!!Form::file('testOut', array('id'=>'testOut')) !!}


        {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
        {!! Form:: close() !!}
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
        <pre id="sampleInPreview"></pre>
        <h4>Ejemplo de Salida</h4>
        <pre id="sampleOutPreview"></pre>
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
        // Focus state for append/prepend inputs
        $('.input-group').on('focus', '.form-control', function () {
            $(this).closest('.input-group, .form-group').addClass('focus');
        }).on('blur', '.form-control', function () {
            $(this).closest('.input-group, .form-group').removeClass('focus');
        });
        $('#name').keyup(function () {
            $('#previewtitle').text($(this).val());
        });
        $('#sampleIn').keyup(function () {
            $('#sampleInPreview').text($(this).val());
        });
        $('#sampleOut').keyup(function () {
            $('#sampleOutPreview').text($(this).val());
        });
        Preview.Init();
        Preview1.Init();
        Preview2.Init();
    });
</script>
</body>
</html>

