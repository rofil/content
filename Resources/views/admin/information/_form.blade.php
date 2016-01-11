{!! Form::model($entity, ['url' => $url, 'method'=>$method, 'files' => true]) !!}

<div class="form-group">
    <label for="title">Judul</label>
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label for="published">Published</label>
    {!! Form::select('published', [0=>"Draft", 1=>'Published'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label for="body">Informasi</label>
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