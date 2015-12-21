@extends("RofilBT::content")

@section("title")
    Edit "{!! $entity->title !!}"
@stop

@section("body")
    @include("RofilContent::admin.news._form")
@stop