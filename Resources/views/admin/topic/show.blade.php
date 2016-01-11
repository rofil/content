@extends("RofilBT::content")

@section("title")
    {!! $entity->name !!}
@stop

@section("body")
    {!! $entity->description !!}
@stop