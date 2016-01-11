@extends("RofilBT::content")

@section("title")
    Edit "{{ $entity->name }}"
@stop

@section("body")
    @include("RofilContent::admin.topic._form")
@stop