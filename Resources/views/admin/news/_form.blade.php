@inject("newsCategory", "Rofil\Content\Entity\Contracts\ListInterface")

{!! Form::model($entity, ['url' => $url, 'method'=>$method, 'files' => true]) !!}

<div class="form-group">
    <label for="title">Judul</label>
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label for="categories">Kategori</label>
    {!! Form::text('categories', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label for="body">Berita</label>
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}