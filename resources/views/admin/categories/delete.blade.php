@extends('admin.master')

@section('adminContent')

<section>
<h3 class="is-700">Eliminar categoria</small></h3>
<p class="lead">Complete los siguientes campos para eliminar una categoria:</p>
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
    <p>Al eliminar una categoria, tenga en cuenta lo siguiente</p>
    <ul>
      <li>Las metas que se encuentran actualmente vinculados con la categoria "{{$category->title}}" no pueden quedar sin categorias</li>
      <li>Para eliminar la categoria, se deben migrar las metas vinculadas a una categoria ya existente</li>
      <li>El siguiente formulario migra todas las metas a la categoria ya existente, si desea migrar alguna meta especificamente a alguna otra categoria, deberá hacerlo de forma manual editando la meta en particular.</li>
    </ul>
     <div class="form-group">
      <label><b>Categoria a la que migran las metas</b><span class="text-danger">*</span></label>
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
      <small class="form-text text-muted">Para poder eliminar la categoria, ingrese su contraseña para confirmar.</small>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>

</section>

@endsection