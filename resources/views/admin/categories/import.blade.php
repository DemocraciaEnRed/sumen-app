@extends('admin.master')

@section('adminContent')

<section>
  <h3 class="is-700">Importar ejes de planificación</h3>
  <p class="lead">Aqui se pueden importar ejes de planificacion desde un archivo .xlsx</p>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
   <div class="alert alert-warning">
    <h5 class="is-700"><i class="fas fa-exclamation-triangle"></i>&nbsp;Importante</h5>
        Lea atentamente el contenido de los siguientes puntos. El formato del .xlsx es <b><u>muy estricto a seguir</u></b> y técnico de elaborar. Siga los siguientes pasos
    </div>
    <h5 class="is-700">Descargue la planilla modelo de ejemplo</h5>
    <p><b>Nota:</b> No elimine la primera fila, que son los cabezales</p>
    <p><a href="{{asset('files/base_import_categories.xlsx')}}" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i>&nbsp;Descargar planilla base</a></p>
    <h5 class="is-700">Especificaciones</h5>
    <p>En las columna <code>nombre</code> va texto de una sola linea.</p>
    <p>En las columna de <code>icono</code>, debe ir un icono de <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome 5</a> la que pertenece. Utilice la herramienta para encontrar su icono y como debe ser ingresado</p>
    <p>En las columna de <code>color</code>, debe ser en HEX y llevar el <code>#</code> al inicio. Puede obtener uno desde <a href="https://www.google.com/search?q=color+picker" target="_blank">esta herramienta de google</a></p>
    <p><b>Nota</b>: Evite el uso de emojis o caracteres especiales.</p>
    <h5 class="is-700">Ejemplo de planilla</h5>
    <p>En el siguiente ejemplo se importarian 3 metas.</p>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
          <th scope="col">nombre</th>
          <th scope="col">icono</th>
          <th scope="col">color</th>
        </tr>
      </thead>
      <tbody>
       <tr>
         <td>Archivo</td>
         <td><code>fas fa-file</code></td>
         <td><code>#e523dd</code></td>
       </tr>
       <tr>
         <td>Cooperativa</td>
         <td><code>fas fa-star</code></td>
         <td><code>#0a4e4d</code></td>
       </tr>
       <tr>
         <td>Ecología</td>
         <td><code>fas fa-tree</code></td>
         <td><code>#3aff00</code></td>
       </tr>
      
      </tbody>
    </table>
     <div class="form-group">
      <h5 class="is-700"><code>icono</code> disponibles</h5>
      <p>Utilice la siguiente herramienta para encontrar su icono</p>
      <p>La plataforma utiliza <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome 5</a> para usar sus iconos. Puede ver la galeria entranado en la web</p>
      <input-icon name="color"></input-icon>
    </div>
    <h3 class="is-700">Importar ejes de planificación</h3>
    <p>Ingrese el archivo en el siguiente campo</p>
    <form action="{{route('admin.categories.import.form')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input-file name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></input-file>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Subir .xlsx</button>
      </div>
    </form>
</section>

@endsection