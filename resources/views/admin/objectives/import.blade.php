@extends('admin.master')

@section('adminContent')

<section>
  <h3 class="is-700">Importar objetivos</h3>
  <p class="lead">Aqui se pueden importar objetivos desde un archivo .xlsx</p>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
  @if (count($categories) > 0)
   <div class="alert alert-warning">
        <h5 class="is-700"><i class="fas fa-exclamation-triangle"></i>&nbsp;Importante</h5>
        Lea atentamente el contenido de los siguientes puntos. El formato del .xlsx es <b><u>muy estricto a seguir</u></b> y técnico de elaborar. Siga los siguientes pasos
    </div>
    <h5 class="is-700">Descargue la planilla modelo de ejemplo</h5>
    <p><b>Nota:</b> No elimine la primera fila, que son los cabezales</p>
    <p><a href="{{asset('files/base_import_objectives.xlsx')}}" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i>&nbsp;Descargar planilla base</a></p>
    <h5 class="is-700">Especificaciones</h5>
    <p>En las columnas de <code>nombre</code> y <code>descripcion</code> va texto de una sola linea.</p>
    <p>En la columna que especifica el <code>eje_de_planificacion</code>, debe ir el ID del eje de planificación a la que pertenece. Solo un numero # debe ser ingresado y <b>es requerido</b>, no puede ser vacio</p>
    <p>En la columna de <code>organizaciones</code> pueden ser vacio, o contener varios ID(s) de las organizaciones. Deben ir separados con "<code>,</code>". Evite 2 comas seguidas. El campo es opcional, lo que significa que puede dejarlo vacio, significando que no hay organizaciones asociadas al objetivo. Puede ingresar 0, 1, o N organizaciones. Verifique que los ID(s) existan. </p>
    <p>En la columna de <code>tags</code> puede incluir distintos tags separados por coma (<code>,</code>) y sin espacios al lado de estos separadores. Cada tag puede tener 1 a muchas palabras sepradas con un espacio. Un tag puede tener hasta 100 caracteres. Ej: Esto esta bien: <code>tagA,tagB,tagC</code> y esto esta mal: <code>tag1, tag2 , tag4</code> </p>
    <p><b>Nota</b>: Evite el uso de emojis en títulos o descripción.</p>
    <h5 class="is-700">Ejemplo de planilla</h5>
    <p>En el siguiente ejemplo se importarian 3 objetivos.</p>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
        <th scope="col">nombre</th>
        <th scope="col">descripción</th>
        <th scope="col">eje_de_planificación</th>
        <th scope="col">organizaciones</th>
        <th scope="col">tags</th>
        </tr>
      </thead>
      <tbody>
       <tr>
         <td>Ciclovias en las calles de la ciudad</td>
         <td>Este es un ejemplo de un texto que funcionaria como descripcion, sín emojis, sin retornos de carro (parrafos)</td>
         <td><code>2</code></td>
         <td><code>2,6,7</code></td>
         <td><code>tag1,tag2,este es un tag con espacios</code></td>
       </tr>
       <tr>
         <td>Plantar nuevos arboles en los caminos peatonales de la ciudad</td>
         <td>Este es un ejemplo de un texto que funcionaria como descripcion, sín emojis, sin retornos de carro (parrafos)</td>
         <td><code>4</code></td>
         <td></td>
         <td></td>
       </tr>
       <tr>
         <td>Renovación de las señales de transito de la ruta 32</td>
         <td>Este es un ejemplo de un texto que funcionaria como descripcion, sín emojis, sin retornos de carro (parrafos)</td>
         <td><code>4</code></td>
         <td><code>2,7</code></td>
         <td><code>un solo tag</code></td>
       </tr>
      </tbody>
    </table>
    <h5 class="is-700"><code>eje_de_planificacion</code> disponibles</h5>
    <ul>
      <li>Requerido: <span class="text-danger"><b>Si</b></span></li>
      <li>Tipo de dato: Unico</li>
      <li>Ejemplo de como escribir en la celda: <code>4</code></li>
    </ul>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col">Eje de planificación</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td class="text-center"><code>{{$category->id}}</code></td>
          <td>{{$category->title}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h5 class="is-700"><code>organizaciones</code> disponibles</h5>
    <ul>
      <li>Requerido: No</li>
      <li>Tipo de dato: Multiple</li>
      <li>Ejemplo de como escribir en la celda: <code>1,13,5</code></li>
    </ul>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col">Nombre Organización</th>
        </tr>
      </thead>
      <tbody>
        @foreach($organizations as $organization)
        <tr>
          <td class="text-center"><code>{{$organization->id}}</code></td>
          <td>{{$organization->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  <h3 class="is-700">Importar objetivos</h3>
  <p>Ingrese el archivo en el siguiente campo</p>

  <form action="{{route('admin.objectives.import.form')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input-file name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></input-file>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Subir .xlsx</button>
    </div>
  </form>
  @else
  <div class="alert alert-warning" role="alert">
    No puede importar objetivos sin eje de planificación. Debe ir al panel de <a href="{{ route('admin.categories') }}">ejes de planificación</a>
  </div>
  @endif
</section>

@endsection