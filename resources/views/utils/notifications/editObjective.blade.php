<h5 class="mb-2 is-700"><i class="fas fa-bullseye fa-fw"></i><i class="fas fa-pencil-alt fa-fw"></i> Meta editado</h5>
<p class="my-1 text-smaller">Han editado el meta <b>"{{$notification->data['objective']['title']}}"</b>. Te invitamos a leer la meta editada haciendo <a href="{{route('objectives.index', ['objectiveId' => $notification->data['objective']['id']])}}" >click aquí</a></p>
<p class="my-1 text-smallest text-muted">
Notificado el @datetime($notification->created_at) - <a
  href="{{route('objectives.index', ['objectiveId' => $notification->data['objective']['id']])}}" title="{{$notification->data['objective']['title']}}">Ver meta</a>
</p>