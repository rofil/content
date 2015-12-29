@extends("RofilBT::one-column")

@section("content")

<h1>Daftar Berita/Artikel</h1>
<hr>
<a href="{{ route('RofilContent.admin.news.create') }}" class="btn btn-primary">Tambah Berita</a>
<hr>

<div class="panel panel-primary">
    <table class="table table-striped table-bordered">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Updated</th>
            <th>Published</th>
            <th></th>
        </thead>
        @foreach($data as $i=>$item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>{{ $item->published }}</td>
            <td>
                <a href="{{ route('RofilContent.admin.news.edit', ['id'=>$item->id]) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop