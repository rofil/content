{!! Form::model($entity, ['url' => $url, 'method'=>$method, 'files' => true]) !!}

<div class="form-group">
    <label for="name">Nama</label>
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label for="descriptions">Keterangan</label>
    {!! Form::textarea('descriptions', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}