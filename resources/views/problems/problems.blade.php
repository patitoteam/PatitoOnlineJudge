<!DOCTYPE html>
<html>

<head>
    <title>Problemset</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}"/>

    <style>
        td{border:1px solid #000;}
        th{background: #99a3a3;}
        tr{
            background:#e0e5e5;

        }
        tr:nth-child(2n){
            background: #ced3d4;
        }
        .right {
            font-style: italic;
            float:right;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Problems Set</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="col-sm-1">#</th>
            <th>Name</th>
            <th class="col-sm-1">AC</th>
            <th class="col-sm-1">Enviar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($problems as $problem)
            <tr>
                <td>{{$problem->id}}</td>
                <td><a href="/problems/{{$problem->id}}">{{$problem->name}}</a><small class="right">tagdgd, auiesf,dav dsv sd,vsd v</small> </td>
            </tr>
        @endforeach


        </tbody>

    </table>
    <div class="pagination pagination-inverse">
        {!!$problems->render()!!}
    </div>


</div>



</body>

</html>

