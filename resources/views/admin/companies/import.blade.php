@extends('admin.master')

@section('adminContent')

<section>
  <h3 class="is-700">Importar empresas</h3>
  <p class="lead">Aqui se pueden importar empresas desde un archivo .xlsx</p>
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
    <p><a href="{{asset('files/base_import_companies.xlsx')}}" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i>&nbsp;Descargar planilla base</a></p>
    <h5 class="is-700">Especificaciones</h5>
    <p>En las columnas de <code>nombre</code> y <code>descripcion</code> va texto de una sola linea.</p>
    <p><b>Nota</b>: Evite el uso de emojis o caracteres especiales.</p>
    <p><b>Nota</b>: No podrá subir logos por este metodo. Puede importar y luego asignarles los logos, o hacerlo uno por uno.</p>
    <h5 class="is-700">Ejemplo de planilla</h5>
    <p>En el siguiente ejemplo se importarian 3 metas.</p>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
          <th scope="col">nombre</th>
          <th scope="col">descripccion</th>
        </tr>
      </thead>
      <tbody>
       <tr>
         <td>Arboleada S.A.</td>
         <td>Empresa dedicada a criar y plantar arboles para ser insertados en la via publica (..)</td>
       </tr>
       <tr>
         <td>Semaforos Hermanos S.A.</td>
         <td>Empresa dedicada a construir semaforos de forma personalizada (..)</td>
       </tr>
       <tr>
         <td>Señaleria Corp.</td>
         <td>Establecida en 1950, Señaleria Corp. se dedica a la creacion de carteles de (..)</td>
       </tr>
      
      </tbody>
    </table>
    <h3 class="is-700">Importar empresas</h3>
    <p>Ingrese el archivo en el siguiente campo</p>
    <form action="{{route('admin.companies.import.form')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input-file name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></input-file>
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Subir .xlsx</button>
      </div>
    </form>
</section>

@endsection