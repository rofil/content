@extends("RofilBT::content")

@section("title")
    {{-- Category --}}
@stop

@section("body")
    <div class="row">
        <div class="col-md-9">
            @include("RofilContent::news._show-by-category")
        </div>
        <div class="col-md-3"></div>
    </div>
    
@stop