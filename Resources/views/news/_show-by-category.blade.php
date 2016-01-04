@foreach($data as $entity)
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <h3>{{ $entity->title }}</h3>
        {!! $entity->body !!}
    </div>
</div>
@endforeach