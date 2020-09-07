<h5 class="mb-2 is-700"><i class="fas fa-medal fa-fw"></i><i class="fas fa-pencil-alt fa-fw"></i> Proyecto editadp</h5>
<p class="my-1 text-smaller">Han editado el proyecto <b>"{{$notification->data['goal']['title']}}"</b>. Te invitamos a leer el proyecto editado haciendo <a href="{{route('goals.index', ['goalId' => $notification->data['goal']['id']])}}" >click aquí</a></p>
<p class="my-1 text-smallest text-muted">
Notificado el @datetime($notification->created_at) - <a
  href="{{route('goals.index', ['goalId' => $notification->data['goal']['id']])}}" title="{{$notification->data['goal']['title']}}">Ver proyecto</a>
- 
<a
  href="{{route('objectives.index', ['objectiveId' => $notification->data['objective']['id']])}}" title="{{$notification->data['objective']['title']}}">Ver meta</a>
</p>