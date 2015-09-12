
<!DOCTYPE html>
<html>

<head>
    <title>Dynamic Preview of Textarea with MathJax Content</title>
    <!-- Copyright (c) 2012-2015 The MathJax Consortium -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}" />
    <script src="{{asset('/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('/js/flat-ui.min.js')}}"></script>
    <script>
        $(function () {
            if ($('[data-toggle="select"]').length) {
                $('[data-toggle="select"]').select2();
            }
        })(jQuery);
    </script>
    <script type="text/x-mathjax-config">
		MathJax.Hub.Config({ showProcessingMessages: false, tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] } });
	</script>
    <script type="text/javascript" src="{{asset('/js/MathJax/MathJax.js?config=TeX-AMS-MML_HTMLorMML')}}"></script>
    <script>
        var Preview = {
            delay: 150, // delay after keystroke before updating

            preview: null, // filled in by Init below
            buffer: null, // filled in by Init below

            timeout: null, // store setTimout id
            mjRunning: false, // true when MathJax is processing
            oldText: null, // used to check if an update is needed

            //
            //  Get the preview and buffer DIV's
            //
            Init: function() {
                this.preview = document.getElementById("MathPreview");
                this.buffer = document.getElementById("MathBuffer");
            },

            //
            //  Switch the buffer and preview, and display the right one.
            //  (We use visibility:hidden rather than display:none since
            //  the results of running MathJax are more accurate that way.)
            //
            SwapBuffers: function() {
                var buffer = this.preview,
                        preview = this.buffer;
                this.buffer = buffer;
                this.preview = preview;
                buffer.style.visibility = "hidden";
                buffer.style.position = "absolute";
                preview.style.position = "";
                preview.style.visibility = "";
            },

            //
            //  This gets called when a key is pressed in the textarea.
            //  We check if there is already a pending update and clear it if so.
            //  Then set up an update to occur after a small delay (so if more keys
            //    are pressed, the update won't occur until after there has been
            //    a pause in the typing).
            //  The callback function is set up below, after the Preview object is set up.
            //
            Update: function() {
                if (this.timeout) {
                    clearTimeout(this.timeout)
                }
                this.timeout = setTimeout(this.callback, this.delay);
            },

            //
            //  Creates the preview and runs MathJax on it.
            //  If MathJax is already trying to render the code, return
            //  If the text hasn't changed, return
            //  Otherwise, indicate that MathJax is running, and start the
            //    typesetting.  After it is done, call PreviewDone.
            //
            CreatePreview: function() {
                Preview.timeout = null;
                if (this.mjRunning) return;
                var text = document.getElementById("MathInput").value;
                if (text === this.oldtext) return;
                this.buffer.innerHTML = this.oldtext = text;
                this.mjRunning = true;
                MathJax.Hub.Queue(
                        ["Typeset", MathJax.Hub, this.buffer], ["PreviewDone", this]
                );
            },

            //
            //  Indicate that MathJax is no longer running,
            //  and swap the buffers to show the results.
            //
            PreviewDone: function() {
                this.mjRunning = false;
                this.SwapBuffers();
            }

        };
        var Preview1 = {
            delay: 150, // delay after keystroke before updating

            preview: null, // filled in by Init below
            buffer: null, // filled in by Init below

            timeout: null, // store setTimout id
            mjRunning: false, // true when MathJax is processing
            oldText: null, // used to check if an update is needed

            //
            //  Get the preview and buffer DIV's
            //
            Init: function() {
                this.preview = document.getElementById("MathPreview1");
                this.buffer = document.getElementById("MathBuffer1");
            },

            //
            //  Switch the buffer and preview, and display the right one.
            //  (We use visibility:hidden rather than display:none since
            //  the results of running MathJax are more accurate that way.)
            //
            SwapBuffers: function() {
                var buffer = this.preview,
                        preview = this.buffer;
                this.buffer = buffer;
                this.preview = preview;
                buffer.style.visibility = "hidden";
                buffer.style.position = "absolute";
                preview.style.position = "";
                preview.style.visibility = "";
            },

            //
            //  This gets called when a key is pressed in the textarea.
            //  We check if there is already a pending update and clear it if so.
            //  Then set up an update to occur after a small delay (so if more keys
            //    are pressed, the update won't occur until after there has been
            //    a pause in the typing).
            //  The callback function is set up below, after the Preview object is set up.
            //
            Update: function() {
                if (this.timeout) {
                    clearTimeout(this.timeout)
                }
                this.timeout = setTimeout(this.callback, this.delay);
            },

            //
            //  Creates the preview and runs MathJax on it.
            //  If MathJax is already trying to render the code, return
            //  If the text hasn't changed, return
            //  Otherwise, indicate that MathJax is running, and start the
            //    typesetting.  After it is done, call PreviewDone.
            //
            CreatePreview: function() {
                Preview.timeout = null;
                if (this.mjRunning) return;
                var text = document.getElementById("MathInput1").value;
                if (text === this.oldtext) return;
                this.buffer.innerHTML = this.oldtext = text;
                this.mjRunning = true;
                MathJax.Hub.Queue(
                        ["Typeset", MathJax.Hub, this.buffer], ["PreviewDone", this]
                );
            },

            //
            //  Indicate that MathJax is no longer running,
            //  and swap the buffers to show the results.
            //
            PreviewDone: function() {
                this.mjRunning = false;
                this.SwapBuffers();
            }

        };
        var Preview2 = {
            delay: 150, // delay after keystroke before updating

            preview: null, // filled in by Init below
            buffer: null, // filled in by Init below

            timeout: null, // store setTimout id
            mjRunning: false, // true when MathJax is processing
            oldText: null, // used to check if an update is needed

            //
            //  Get the preview and buffer DIV's
            //
            Init: function() {
                this.preview = document.getElementById("MathPreview2");
                this.buffer = document.getElementById("MathBuffer2");
            },

            //
            //  Switch the buffer and preview, and display the right one.
            //  (We use visibility:hidden rather than display:none since
            //  the results of running MathJax are more accurate that way.)
            //
            SwapBuffers: function() {
                var buffer = this.preview,
                        preview = this.buffer;
                this.buffer = buffer;
                this.preview = preview;
                buffer.style.visibility = "hidden";
                buffer.style.position = "absolute";
                preview.style.position = "";
                preview.style.visibility = "";
            },

            //
            //  This gets called when a key is pressed in the textarea.
            //  We check if there is already a pending update and clear it if so.
            //  Then set up an update to occur after a small delay (so if more keys
            //    are pressed, the update won't occur until after there has been
            //    a pause in the typing).
            //  The callback function is set up below, after the Preview object is set up.
            //
            Update: function() {
                if (this.timeout) {
                    clearTimeout(this.timeout)
                }
                this.timeout = setTimeout(this.callback, this.delay);
            },

            //
            //  Creates the preview and runs MathJax on it.
            //  If MathJax is already trying to render the code, return
            //  If the text hasn't changed, return
            //  Otherwise, indicate that MathJax is running, and start the
            //    typesetting.  After it is done, call PreviewDone.
            //
            CreatePreview: function() {
                Preview.timeout = null;
                if (this.mjRunning) return;
                var text = document.getElementById("MathInput2").value;
                if (text === this.oldtext) return;
                this.buffer.innerHTML = this.oldtext = text;
                this.mjRunning = true;
                MathJax.Hub.Queue(
                        ["Typeset", MathJax.Hub, this.buffer], ["PreviewDone", this]
                );
            },

            //
            //  Indicate that MathJax is no longer running,
            //  and swap the buffers to show the results.
            //
            PreviewDone: function() {
                this.mjRunning = false;
                this.SwapBuffers();
            }

        };


        //
        //  Cache a callback to the CreatePreview action
        //
        Preview.callback = MathJax.Callback(["CreatePreview", Preview]);
        Preview.callback.autoReset = true; // make sure it can run more than once
        Preview1.callback = MathJax.Callback(["CreatePreview", Preview1]);
        Preview1.callback.autoReset = true; // make sure it can run more than once
        Preview2.callback = MathJax.Callback(["CreatePreview", Preview2]);
        Preview2.callback.autoReset = true; // make sure it can run more than once
    </script>
    <script src="{{asset('/js/ckeditor/ckeditor.js')}}"></script>
</head>

<body>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::model($problem, [
'method' => 'PATCH',
'route' => ['problems.update', $problem->id]
]) !!}
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! Form::label('input', 'Input:',['class'=>'control-label']) !!}
    {!! Form::textarea('input', null, ['class' => 'form-control']) !!}
    {!! Form::label('output', 'Output:',['class'=>'control-label']) !!}
    {!! Form::textarea('output', null, ['class' => 'form-control']) !!}
    {!! Form::label('sample_input', 'Ejemplo de Entrada:',['class'=>'control-label']) !!}
    {!! Form::textarea('sample_input', null, ['class' => 'form-control']) !!}
    {!! Form::label('sample_output', 'Ejemplo de Salida:',['class'=>'control-label']) !!}
    {!! Form::textarea('sample_output', null, ['class' => 'form-control']) !!}
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
    {!! Form::submit('Update Problem', array('class' => 'btn btn-primary')) !!}
{!! Form:: close() !!}
<script>
    $(function(){
        $('#tags1').on('change', function(){
            $('#tags2').val($(this).val());
        });
    });

</script>