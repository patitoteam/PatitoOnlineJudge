
<!DOCTYPE html>
<html>

<head>
    <title>Dynamic Preview of Textarea with MathJax Content</title>
    <!-- Copyright (c) 2012-2015 The MathJax Consortium -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}"/>
    <script src="{{asset('/js/jquery-2.1.1.min.js')}}"></script>
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

<div class="container">
    <div id="editor" name="editor">
        <h1>Hello world!</h1>
        <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
    </div>
    <script>

        CKEDITOR.replace('editor',{

                    extraPlugins: 'uploadimage,image2',
                    height: 300,

                    // Upload images to a CKFinder connector (note that the response type is set to JSON).
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
                    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
                    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                    // The following options are not necessary and are used here for presentation purposes only.
                    // They configure the Styles drop-down list and widgets to use classes.

                    stylesSet: [
                        { name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
                        { name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
                    ],

                    // Load the default contents.css file plus customizations for this sample.
                    contentsCss: [ CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css' ],

                    // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
                    // resizer (because image size is controlled by widget styles or the image takes maximum
                    // 100% of the editor width).
                    image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
                    image2_disableResizer: true


        } );
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
<br/> Preview is shown here:
<script>
    window.onload=function () {
        $('#title').keyup(function () {
            $('#previewtitle').text($(this).val());
        });
        $('#MathInput3').keyup(function () {
            $('#MathPreview3').text($(this).val());
        });
        $('#MathInput4').keyup(function () {
            $('#MathPreview4').text($(this).val());
        });
    }
    Preview.Init();
    Preview1.Init();
    Preview2.Init();
</script>


</body>

</html>

