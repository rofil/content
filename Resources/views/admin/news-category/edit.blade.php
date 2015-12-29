@extends("RofilBT::content")

@section("title")
    Edit "{{ $entity->name }}"
@stop

@section("body")
    @include("RofilContent::admin.news-category._form")
@stop