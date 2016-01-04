@extends("RofilBT::content")

@section("title")
    {!! $entity->title !!}
@stop

@section("body")

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
              <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
              <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
          </div>
      </div>
  </div>
    

    <hr>

    {!! $entity->body !!}
@stop