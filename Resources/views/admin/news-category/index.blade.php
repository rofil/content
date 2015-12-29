@extends("RofilBT::one-column")

@section("content")

<h1>Daftar Berita/Artikel</h1>
<hr>
<a href="{{ route('RofilContent.admin.news-category.create') }}" class="btn btn-primary">Tambah Categori Berita</a>
<hr>

<div class="panel panel-primary">
    <table class="table table-striped table-bordered">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th></th>
        </thead>
        @foreach($data as $i=>$item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->descriptions }}</td>
            <td>
                <a href="{{ route('RofilContent.admin.news-category.edit', ['id'=>$item->id]) }}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop