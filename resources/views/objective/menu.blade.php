@php
  $currentRoute = Route::currentRouteName();
	$currentRouteGoalId = Route::current()->parameters()['goalId'] ?? false ;
  $sharerLink = urlencode($currentRoute == 'objectives.index' ? route('objectives.index',['objectiveId'=> $objective->id]) : route('goals.index',['goalId'=> $goal->id]))
@endphp

<div class="card shadow-sm rounded mb-3">
  @if(!is_null($objective->cover))
    <div class="card-img-top has-background-image" alt="Card image cap" style="height:200px; background-image:url('{{$objective->cover->thumbnail_path}}')"></div>
  @endif
  @if($objective->completed)
  <div class="card-body bg-success text-center text-white">
    <div class="animate__animated animate__heartBeat">
      <i class="fas fa-check fa-lg"></i>&nbsp;<b>Meta completada</b>
    </div>
  </div>  
  @endif

  <div class="card-body pb-2">
    <div class="d-flex align-items-center mb-3">
      <div class="mr-3 category-icon-container" style="background-color: {{$objective->category->background_color}}">
        <i class="fa-2x fa-fw {{$objective->category->icon}}" style="color: {{$objective->category->color}}"></i>
      </div>
      <div class="w-100">
        <span class=" text-smallest" style="color:{{$objective->category->color}}">{{$objective->category->title}}</span>
        <h6 class="is-600 m-0">
          {{$objective->title}}
        </h6>
      </div>
    </div>
    <div class="my-3">
      @forelse ($objective->tags as $tag)
      <li class="list-inline-item"><span class="text-muted text-smallest">{{$tag}}</span></li>
      @empty
      <li class="list-inline-item text-muted">No hay tags</li>
      @endforelse
    </div>
    @if(!$objective->communities->isEmpty())
      <p class="text-smaller text-muted my-2">¡Unite a nuestra comunidad!</p>
      @foreach($objective->communities as $community)
              <a href="{{$community->url}}" target="_blank" class="py-1 px-2 text-smallest rounded d-inline-block my-1 mb-1" style="border: 1px solid {{$community->color}}; color: {{$community->color}}"><i class="{{$community->icon}}"></i>&nbsp;{{$community->label}}</a>
      @endforeach  
    @endif
    <p class="text-smaller text-muted mt-2 mb-0">¡Compartí en redes! 
      <a href="https://facebook.com/sharer.php?u={{$sharerLink}}" target="_blank" class="d-inline-block mx-2 text-success"><i class="fab fa-facebook-f fa-lg"></i></a>
      <a href="https://twitter.com/intent/tweet?url={{$sharerLink}}" target="_blank" class="d-inline-block mx-2 text-success"><i class="fab fa-twitter fa-lg"></i></a>
      <a href="https://linkedin.com/shareArticle?mini=true&url={{$sharerLink}}" target="_blank" class="d-inline-block mx-2 text-success"><i class="fab fa-linkedin-in fa-lg"></i></a>
    </p>
  </div>
   @isManager($objective->id)
  <hr>
  <div class="pl-3">
    <a href="{{route('objectives.manage.index',['objectiveId'=> $objective->id])}}" class="btn btn-link btn-sm"><i class="fas fa-external-link-alt"></i> Panel meta</a>
    @if($currentRoute == 'goals.index')
    <a href="{{route('objectives.manage.goals.index',['objectiveId'=> $objective->id, 'goalId' => $goal->id])}}" class="btn btn-link btn-sm"><i class="fas fa-external-link-alt"></i> Panel proyecto</a>
    @endif
  </div>
  @endisManager
  <hr>
  <ul class="list-unstyled objective-goals-list">
    <li class="list-item py-2 pl-4 pr-3 {{ $currentRoute == 'objectives.index' ? 'active' : null}} "><a href="{{route('objectives.index',['objectiveId' => $objective->id])}}">Vista general de la meta</a></li>
    @forelse ($objective->goals as $goalAux)
    <li class="list-item py-2 pl-4 pr-3 {{ $currentRoute == 'goals.index' && $currentRouteGoalId == $goalAux->id ? 'active' : null }}"><i class="far fa-dot-circle fa-fw text-{{$goalAux->status}}"></i>&nbsp;<a href="{{route('goals.index',['goalId' => $goalAux->id])}}">{{$goalAux->title}}</a></li>
    @empty
    <li class="list-item py-2 pl-4 pr-3 text-muted">No hay proyectos</li>
    @endforelse
  </ul>
</div>