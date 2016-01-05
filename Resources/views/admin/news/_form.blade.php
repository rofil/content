@inject("topic", "Rofil\Content\Entity\Contracts\TopicInterface")

{!! Form::model($entity, ['url' => $url, 'method'=>$method, 'files' => true]) !!}

<div class="form-group">
    <label for="title">Judul</label>
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="image_file">Gambar</label>
            {!! Form::file('image_file', ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="topic_id">Topic</label>
            {!! Form::select('topic_id', $topic->lists(), null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="published">Published</label>
            {!! Form::select('published', [0=>"Draft", 1=>"Published"], null, ['class'=>'form-control']) !!}
        </div>
    </div>
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

<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'body', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });
</script>