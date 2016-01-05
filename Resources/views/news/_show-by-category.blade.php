@foreach($data as $entity)
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <h3><a href="{{ route('RofilContent.news.show', ['id'=>$entity->id]) }}">{{ $entity->title }}</a> </h3>
        {!! $entity->body !!}
    </div>
</div>
@endforeach