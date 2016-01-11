@extends("RofilBT::content")

@section("title")
    <h2>{{ $entity->title }}</h2>
@stop

@section("body")
    {!! $entity->body !!}
@stop