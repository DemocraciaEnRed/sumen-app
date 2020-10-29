@extends('admin.master')

@section('adminContent')

<section>
  <h3 class="is-700">Crear distrito</h3>
  <p class="lead">Para crear un distrito, completa los siguientes campos:</p>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form method="POST" action="{{ route('admin.districts.create.form') }}">
    @csrf
    <div class="form-group">
      <label><b>Nombre</b> <small class="text-danger">*</small></label>
      <input type="text" class="form-control" name="name" placeholder="Ingrese un nombre" maxlength="225">
      <small class="text-muted">Hasta 225 caracteres.</small>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
</section>

@endsection