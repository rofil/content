@extends("RofilBT::content")

@section("title")
    {{-- Category --}}
@stop

@section("body")
    @include("RofilContent::news._show-by-category")
@stop