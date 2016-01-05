@extends("RofilBT::content")

@section("title")
    {{ $entity->title }}
@stop

@section("body")
    @if($entity->getCategories)
    <ul class="list-inline" style="display:inline">
        <li><span class="glyphicon glyphicon-tags"></span></li>
        @foreach($entity->getCategories as $r)
            <li><a href="{{ route('RofilContent.news.showByCategory', ['id'=>$r->id]) }}">{{ $r->name }}</a></li>
        @endforeach
    </ul>
    @endif

    <hr>

    {{ $entity->body }}
@stop