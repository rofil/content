@foreach($data as $entity)
<div class="row">
    <div class="col-md-3">
        <img src="{{ Image::make($entity->imagePath)->widen(300)->encode('data-url') }}" alt="" class="img-responsive thumbnail">
    </div>
    <div class="col-md-9">
        <h3><a href="{{ route('RofilContent.news.show', ['id'=>$entity->id]) }}">{{ $entity->title }}</a> </h3>
        <p align="justify">{!! $entity->cuplikan !!}</p> 

        <hr>
        <div class="">
            <span class="glyphicon glyphicon-calendar"></span> {{ $entity->updated_at }} 
            <span class="glyphicon glyphicon-user"></span> {{ $entity->author }}
            
            @if($entity->categories !== "")
                <span class="glyphicon glyphicon-tags"></span> {{ $entity->categories }}
            @endif

            @if($entity->topicName !== null)    
                <span class="glyphicon glyphicon-folder-open"></span> {{ $entity->topicName }} 
            @endif
        </div>
    </div>
</div>
<div>&nbsp;</div>
@endforeach