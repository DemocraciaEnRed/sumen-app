@extends('admin.master')

@section('adminContent')

<section>
<h3 class="is-700">Eliminar empresa</small></h3>
<p class="lead">Complete los siguientes campos para eliminar un distrito:</p>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="{{ route('admin.companies.delete.form',['companyId' => $company->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <p>Eliminar una empresa no tiene grandes impactos.</p>
    <div class="form-group">
      <label><b>Ingrese su contraseña</b><span class="text-danger">*</span></label>
      <input type="password" class="form-control" name="password">
      <small class="form-text text-muted">Para poder eliminar la empresa, ingrese su contraseña para confirmar.</small>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>

</section>

@endsection