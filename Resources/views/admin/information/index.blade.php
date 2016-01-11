@extends("RofilBT::one-column")

@section("content")

<h1>Daftar Informasi</h1>
<hr>
<a href="{{ route('RofilContent.admin.information.create') }}" class="btn btn-primary">Tambah Informasi</a>
<hr>

<div class="panel panel-default">
    <table class="table table-striped table-bordered">
        <thead>
            <th>#</th>
            <th>Judul</th>
            <th>Published</th>
            <th>Author</th>
            <th>Options</th>
        </thead>
        @foreach($data as $i=>$item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td><a href="{{ route("RofilContent.admin.information.show", ['id'=>$item->id]) }}">{{ $item->title }}</a></td>
            <td>{{ $item->namePublished }}</td>
            <td>{{ $item->author }}</td>
            <td>
                <a href="{{ route('RofilContent.admin.information.edit', ['id'=>$item->id]) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $data->pagination !!}
@stop