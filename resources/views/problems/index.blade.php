<!DOCTYPE html>
<html>
<head>
    <title>Problemset</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/flat-ui.min.css')}}" />
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
    <link rel="stylesheet" href="{{asset('/css/fa/font-awesome.min.css')}}"/>
</head>

<body>

<div class="container">
    <h1>Problems Set</h1>
    <a href="{{route('problems.create')}}" class="btn btn-inverse">Crear Prolema</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="col-sm-1">#</th>
            <th>Name</th>
            <th class="col-sm-1">Submit</th>
            <th class="col-sm-1">AC</th>
            <th class="col-sm-1">Enviar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($problems as $problem)
            <tr>
                <td>{{$problem->id}}</td>
                <td><a href="{{ route('problems.show', $problem->id) }}">{{$problem->name}}</a>
                    <small class="right">
                        @foreach($hastags as $ht)
                            @if($ht->problem_id==$problem->id)
                                @foreach($tag as $t)
                                    @if($t->id==$ht->tag_id)
                                        <a href="{{route('problems.tag.show', $t->name)}}" title="{{$t->description}}">{{$t->name}}</a>,&nbsp;
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </small>
                    <a  href="{{ route('problems.edit', $problem->id) }}" title="edit problem {{$problem->id}}"> <i class="fa fa-edit fa-lg"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['problems.destroy', $problem->id]]) !!}

                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o fa-lg"></i></button>

                    {!! Form::close() !!}
                </td>
                <td style="text-align: center">
                    {!! link_to('submit/'.$problem->id,'enviar') !!}


                </td>
            </tr>
        @empty
            <p>No problem with,   <a href="{{route('problems.index')}}">all problems </a></p>
        @endforelse
        </tbody>

    </table>
    <div class="pagination pagination-inverse">
        {!!$problems->render()!!}
    </div>


</div>



</body>

</html>

