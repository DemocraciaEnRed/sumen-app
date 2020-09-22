@extends('admin.master')

@section('adminContent')

<section>
<h3 class="is-700">Eliminar eje de planificación</small></h3>
<p class="lead">Complete los siguientes campos para eliminar un eje de planificación:</p>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="{{ route('admin.categories.delete.form',['categoryId' => $category->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <p>Al eliminar un eje de planificación, tenga en cuenta lo siguiente</p>
    <ul>
      <li>Las metas que se encuentran actualmente vinculados con el eje de planificación "{{$category->title}}" no pueden quedar sin eje de planificación</li>
      <li>Para eliminar el eje de planificación, se deben migrar las metas vinculadas a un eje de planificación ya existente</li>
      <li>El siguiente formulario migra todas las metas a los ejes de planificación ya existente, si desea migrar alguna meta especificamente a algun otro eje de planificación, deberá hacerlo de forma manual editando la meta en particular.</li>
    </ul>
     <div class="form-group">
      <label><b>Eje de planificación a la que migran las metas</b><span class="text-danger">*</span></label>
      <select class="custom-select" name="category">
        @foreach ($categories as $categoryAux)
        @if($categoryAux->id != $category->id)
        <option value="{{$categoryAux->id}}">{{$categoryAux->title}}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label><b>Ingrese su contraseña</b><span class="text-danger">*</span></label>
      <input type="password" class="form-control" name="password">
      <small class="form-text text-muted">Para poder eliminar el eje de planificación, ingrese su contraseña para confirmar.</small>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>

</section>

@endsection