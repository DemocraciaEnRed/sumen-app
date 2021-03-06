@extends('objective.manage.goals.master')

@section('panelContent')

<section>
  <h3 class="is-700">Nuevo hito</h3>
  <p class="lead">Para sumar un nuevo hito a el proyecto, completá el siguiente campo</p>
  <hr>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form method="POST" action="{{ route('objectives.manage.goals.milestones.add.form',['objectiveId' => $objective->id, 'goalId' => $goal->id]) }}">
    @csrf
    <div class="form-group">
      <label><b>Título del hito</b></label>
      <input type="text" class="form-control" name="title" placeholder="Escriba aquí" maxlength="550">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
</section>

@endsection