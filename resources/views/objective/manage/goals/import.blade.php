@extends('objective.manage.master')

@section('panelContent')

<section>
  <h3 class="is-700">Importar proyectos</h3>
  <p class="lead">Aqui se pueden importar proyectos a la meta desde un archivo .xlsx</p>
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
    <p><a href="{{asset('files/base_import_goals.xlsx')}}" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i>&nbsp;Descargar planilla base</a></p>
    <h5 class="is-700">Especificaciones</h5>
    <p>En las columnas <code>nombre</code>, <code>indicador</code>, <code>unidad_indicador</code>, <code>frecuencia</code>, <code>presupuesto_total</code>, <code>presupuesto_ejecutado</code>, <code>fuente_datos</code>, <code>empresas</code>, va texto de una sola linea.</p>
    <p>En las columna de <code>estado</code> debe ir un unico ID la que pertenece. Solo un numero # debe ser ingresado y <b>es requerido</b>, no puede ser vacio</p>
    <p>En las columna de <code>distritos</code>, pueden ser vacio, o contener varios ID(s) de los distritos relacionadas. Deben ir separados con "<code>,</code>". Evite 2 comas seguidas. El campo es opcional, lo que significa que puede dejarlo vacio, significando que no hay distritos asociadas al proyecto. Puede ingresar 0, 1, o N distritos. Verifique que los ID(s) existan.</p>
    @if(config('services.sumen.districts'))
    <p class="text-danger"><b>NOTA: Esta instalación no cuenta con el modulo de distritos.<br>Por favor, deje la columna <code>distrito</code> vacia</b></p>
    @endif
    <p>En las columnas <code>valor_meta_100</code> y <code>valor_inicial</code> deben ser numeros. <code>valor_meta_100</code> debe ser mayor a 0. <code>valor_inicial</code> puede ser 0</p>
    <p>En las columnas <code>empresas</code>, <code>metas_relacionadas</code>  pueden ser vacio, o contener varios ID(s) de las empresas / metas relacionadas. Deben ir separados con "<code>,</code>". Evite 2 comas seguidas. El campo es opcional, lo que significa que puede dejarlo vacio, significando que no hay empresas/metas asociadas al proyecto. Puede ingresar 0, 1, o N empresas/metas. Verifique que los ID(s) existan. </p>
    <p>En la columna de <code>url_mas_info</code> puede incluir una unica URL, que comience con <code>https://</code>. El campo es opciona, lo cual, puede dejarlo vacio de preferir.</p>
    <p>En la columna de <code>hitos</code> puede incluir distintos hitos separados por coma (<code>,</code>) y sin espacios al lado de estos separadores. Cada hitos puede tener 1 a muchas palabras sepradas con un espacio. Un hito puede tener hasta 100 caracteres. Ej: Esto esta bien: <code>hitoA,hitoB,hitoC</code> y esto esta mal: <code>hito1, hito2, hito3</code> </p>
    <p><b>Nota</b>: Evite el uso de emojis o caracteres especiales.</p>
    <h5 class="is-700">Ejemplo de planilla</h5>
    <p>En el siguiente ejemplo se importarian 3 metas.</p>
    <table class="table table-bordered table-sm table-responsive">
      <thead>
        <tr>

          <th scope="col">nombre</th>
          <th scope="col">estado</th>
          <th scope="col">distritos</th>
          <th scope="col">indicador</th>
          <th scope="col">valor_meta_100</th>
          <th scope="col">valor_inicial</th>
          <th scope="col">unidad_indicador</th>
          <th scope="col">frecuencia</th>
          <th scope="col">presupuesto_total</th>
          <th scope="col">presupuesto_ejecutado</th>
          <th scope="col">fuente_datos</th>
          <th scope="col">url_mas_info</th>
          <th scope="col">hitos</th>
          <th scope="col">empresas</th>
          <th scope="col">metas_relacionadas</th>
        </tr>
      </thead>
      <tbody>
       <tr>
         <td>Subir 10 datasets en formato csv</td>
         <td><code>1</code></td>
         <td><code>2,3</code></td>
         <td>Dataset en formato csv</td>
         <td><code>10</code></td>
         <td><code>0</code></td>
         <td>Dataset</td>
         <td>Semanal</td>
         <td>ARS 20000</td>
         <td>0 ARS</td>
         <td>Direccion de datos abiertos</td>
         <td><code>https://www.google.com</code></td>
         <td><code>crear equipo de datos abiertos,reunion interna de equipo</code></td>
         <td>Data S.A.</td>
         <td><code></code></td>
       </tr>
       <tr>
         <td>Colocar 100 semaforos en Avenidas</td>
         <td><code>3</code></td>
         <td><code></code></td>
         <td>Semaforos colocados en esquinas</td>
         <td><code>100</code></td>
         <td><code>0</code></td>
         <td>semaforos</td>
         <td>mensual</td>
         <td>3000 USD</td>
         <td>3 USD</td>
         <td>Ministerio de transporte</td>
         <td><code>https://www.instagram.com</code></td>
         <td><code>selección de intersecciones en donde colocar semaforos,creación de equipo de seguridad vial</code></td>
         <td>Semaforos ACT</td>
         <td><code>1,3</code></td>
       </tr>
       <tr>
         <td>Plantar arboles en las plazas de vecinos</td>
         <td><code>2</code></td>
         <td><code>4</code></td>
         <td>Arboles plantados</td>
         <td><code>10</code></td>
         <td><code>0</code></td>
         <td>arboles</td>
         <td>diario</td>
         <td>0 ARS</td>
         <td>0 ARS</td>
         <td>Ministerio de arbolitos</td>
         <td><code>https://www.arbolitos.com</code></td>
         <td><code>selección de arbol a plantar,compra de semillas</code></td>
         <td>Arboleada ONG</td>
         <td><code>2</code></td>
       </tr>
      
      </tbody>
    </table>
    <h5 class="is-700"><code>estado</code> disponibles</h5>
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
        <tr>
          <td class="text-center"><code>1</code></td>
          <td>En progreso</td>
        </tr>
        <tr>
          <td class="text-center"><code>2</code></td>
          <td>Demorado</td>
        </tr>
        <tr>
          <td class="text-center"><code>3</code></td>
          <td>Inactivo</td>
        </tr>
        <tr>
          <td class="text-center"><code>4</code></td>
          <td>Alcanzado</td>
        </tr>
      </tbody>
    </table>
    <h5 class="is-700"><code>distritos</code> disponibles</h5>
    @if(config('services.sumen.districts'))
    <ul>
      <li>Requerido: <span class="text-danger"><b>Si</b></span></li>
      <li>Tipo de dato: Unico</li>
      <li>Ejemplo de como escribir en la celda: <code>4</code></li>
    </ul>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col">Distrito</th>
        </tr>
      </thead>
      <tbody>
        @foreach($districts as $district)
        <tr>
          <td class="text-center"><code>{{$district->id}}</code></td>
          <td>{{$district->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p class="text-danger"><b>Esta instalacion no cuenta con el modulo de distritos.<br>Por favor, deje la columna <code>distrito</code> vacia</b></p>
    @endif
    <h5 class="is-700"><code>empresas</code> disponibles</h5>
    <ul>
      <li>Requerido: No</li>
      <li>Tipo de dato: Multiple</li>
      <li>Ejemplo de como escribir en la celda: <code>1,4,7</code></li>
    </ul>
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col">Empresa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $company)
        <tr>
          <td class="text-  center"><code>{{$company->id}}</code></td>
          <td>{{$company->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h5 class="is-700"><code>metas_relacionadas</code> disponibles</h5>
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
        @foreach($objectivesList as $objectiveAux)
        <tr>
          <td class="text-center"><code>{{$objectiveAux->id}}</code></td>
          <td>{{$objectiveAux->title}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  <h3 class="is-700">Importar proyectos</h3>
  <p>Ingrese el archivo en el siguiente campo</p>

  <form action="{{route('objectives.manage.goals.import.form',['objectiveId' => $objective->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input-file name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></input-file>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Subir .xlsx</button>
    </div>
  </form>
</section>

@endsection