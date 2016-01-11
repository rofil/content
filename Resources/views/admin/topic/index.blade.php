@extends("RofilBT::one-column")

@section("content")

<h1>Daftar Topik</h1>
<hr>
<a href="{{ route('RofilContent.admin.topic.create') }}" class="btn btn-primary">Tambah Topik</a>
<hr>

<div class="panel panel-default">
    <table class="table table-striped table-bordered">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Options</th>
        </thead>
        @foreach($data as $i=>$item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td><a href="{{ route("RofilContent.admin.topic.show", ['id'=>$item->id]) }}">{{ $item->name }}</a></td>
            <td>{{ $item->description }}</td>
            <td>
                <a href="{{ route('RofilContent.admin.topic.edit', ['id'=>$item->id]) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $data->render() !!}
@stop