@extends("RofilBT::content")

@section("title")
    {!! $entity->title !!}
@stop

@section("body")
<pre>
    {{-- {{ $entity->imagePath }} --}}
    <?php
      $img = Image::make($entity->imagePath);

      // echo ();
    ?>
</pre>
    <img src="{{ Image::make($entity->imagePath)->widen(300)->encode('data-url') }}" alt="">
    <div class="row">
      <div class="col-md-9">
        <span class="glyphicon glyphicon-user"></span> {{ $entity->author }}
        
        @if($entity->getCategories)
        <ul class="list-inline" style="display:inline">
            <li><span class="glyphicon glyphicon-tags"></span></li>
            @foreach($entity->getCategories as $r)
                <li><a href="">{{ $r->name }}</a></li>
            @endforeach
        </ul>
        @endif
      </div>
      <div class="col-md-3 text-right">
          <div class="btn-group">
              <a href="{{ route('RofilContent.admin.news.edit', [ 'id'=>$entity->id ]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
              <button class="btn btn-danger"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#myModal"></button>
          </div>
      </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Konten</h4>
          </div>
          <div class="modal-body">
            Anda yakin mau menghapus konten dengan judul <br><b>"{{ $entity->title }}"?</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            {!! Form::open([
                'url'=>route('RofilContent.admin.news.destroy', ['id'=>$entity->id]),
                'method'=>'DELETE',
                'style' => 'display:inline'
            ]) !!}
                <input type="hidden" name="id" value="{{ $entity->id }}">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>
            
          </div>
        </div>
      </div>
    </div>

    <hr>

    {!! $entity->body !!}
@stop