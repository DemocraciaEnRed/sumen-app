@extends('layouts.admin')

@section('content')

<div class="container push-to-header">
  @if($objective->hidden)
  <div class="alert alert-info">
    <i class="fas fa-info-circle"></i>&nbsp;Nota: La meta se encuentra <b>oculta</b>. <a href="{{route('objectives.manage.configuration', ['objectiveId' => $objective->id]) }}">Cambiar<i class="fas fa-arrow-right fa-fw"></i></a>
  </div>
  @endif
  @if($objective->completed)
  <div class="alert alert-success">
    <i class="fas fa-info-circle"></i>&nbsp;Nota: La meta se encuentra <b>completa</b>. <a href="{{route('objectives.manage.configuration', ['objectiveId' => $objective->id]) }}">Cambiar<i class="fas fa-arrow-right fa-fw"></i></a>
  </div>
  @endif
  <div class="row">
    <div class="col-md-4 col-lg-3">
      <div id="menu" class="card shadow-sm rounded">
        <div class="card-body">

      @include('objective.manage.goals.menu')
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">
      <div class="card shadow-sm rounded">
        <div class="card-body p-3 p-lg-5">
      @yield('panelContent')
        </div>
      </div>
    </div>
  </div>
</div>

@endsection