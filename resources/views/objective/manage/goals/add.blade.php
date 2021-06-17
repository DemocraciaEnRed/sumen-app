@extends('objective.manage.master')

@section('panelContent')

<section>
  <h3 class="is-700">Nuevo proyecto de la meta</h3>
  <p class="lead">Para sumar un nuevo proyecto a tu meta, completá los campos a continuación:</p>
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
  <form method="POST" action="{{ route('objectives.manage.goals.add.form',['objectiveId' => $objective->id]) }}">
    @csrf
    <div class="form-group">
      <label><b>Título del proyecto</b><span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="title" placeholder="Escriba aquí">
    </div>
    <div class="form-group">
      <label><b>Indicador</b><span class="text-danger">*</span></label>
      <input type="text" class="form-control" name="indicator" placeholder="Escriba aquí">
      <small class="form-text text-muted">Solo puede haber un indicador por Proyecto. El indicador tiene ser mensurable, específico, asociado a un plazo de tiempo y lugar</small>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="form-group">
          <label><b>Valor de meta (100%) del indicador</b><span class="text-danger">*</span></label>
          <input type="number" class="form-control" min="1" name="indicator_goal" placeholder="Ej: 100">
          <small class="form-text text-muted">¿A que valor hay que llegar? Este es valor que representa que se llego a completar el proyecto al 100%.</small>
        </div>

      </div>
      <div class="col">
        <div class="form-group">
          <label><b>Valor inicial del indicador</b><span class="text-danger">*</span></label>
          <input type="number" class="form-control" min="0" name="indicator_progress" value="0" placeholder="Ej: 0">
          <small class="form-text text-muted">Es el valor con la que comenzará el proyecto. Los reportes de actualización irán agregando (o restando). El campo vacio será considerado como 0 </small>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="form-group">
          <label><b>Unidad del indicador</b><span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="indicator_unit" placeholder="Ej: Porcentaje, Tasa de Variación, Promedio, Número Índice">
          <small class="form-text text-muted">Unidad de calculo, es la forma en la que vamos a medir nuestro indicador: Porcentaje, Variación, Promedio, Número Índice. Ej: KMs, Metros, Arboles plantados, Etc.</small>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label><b>Frecuencia de monitoreo</b> <small class="text-info">Opcional</small></label>
          <input type="text" class="form-control" name="indicator_frequency" placeholder="Ej: Semanal, mensual, semestral, anual, etc">
          <small class="form-text text-muted">Espacio temporal en el que vamos a medir nuestro indicador : Semanal, mensual, semestral, anual, etc.</small>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="form-group">
          <label><b>Presupuesto Total</b><span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="total_budget" placeholder="Ingrese aquí el valor">
          <small class="form-text text-muted">Presupuesto total a ejecutar del proyecto.</small>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label><b>Presupuesto Ejecutado</b> <small class="text-info">Opcional</small></label>
          <input type="text" class="form-control" name="executed_budget" placeholder="Ingrese aquí el valor">
          <small class="form-text text-muted">Recuerde actualizar este valor periódicamente.</small>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label><b>Estado inicial del proyecto</b><span class="text-danger">*</span></label>
      <select class="custom-select" name="status">
        <option value="ongoing" selected>En progreso</option>
        <option value="delayed" >Demorado</option>
        <option value="inactive" >Inactivo</option>
        <option value="reached" disabled>Alcanzado</option>
      </select>
      <small class="form-text text-muted">Nota: No puede crear un proyecto con estado "Alcanzado"</small>
    </div>
    <div class="form-group">
      <label><b>Fuente de los datos</b> <small class="text-info">Opcional</small></label>
      <input type="text" class="form-control" name="source" placeholder="Escriba aquí">
      <small class="form-text text-muted">Es importante que la fuente de datos sean accesibles y oficiales para hacer transparente la medición</small>
    </div>
    <div class="form-group">
      <label><b>URL para solicitar mas información</b> <small class="text-info">Opcional</small></label>
      <input type="url" class="form-control" name="request_info_url" placeholder="Ejemplo: https://google.com">
      <small class="form-text text-muted">Copie y pegue la URL a donde pueden solicitar mas información. ¡Cuidado con el formato! Aseguresé que sea una URL bien formada.</small>
    </div>
    <div class="form-group">
      <label><b>Hitos</b> <small class="text-info">Opcional</small></label>
      <input-add-milestones-create-goal name="milestones">
    </div>
    @if(config('services.sumen.districts'))
    <div class="form-group">
      <label><b>Distritos que abarca</b></label>
      <div>
        @if(count($districts) > 0) 
          @foreach($districts as $district)
            <div class="custom-control custom-checkbox form-check-inline">
              <input class="custom-control-input" type="checkbox" name="districts[]" id="dis{{$district->id}}" :value="{{$district->id}}">
              <label class="custom-control-label" for="dis{{$district->id}}">{{$district->name}}</label>
            </div>
          @endforeach
        @else
         <p><i>No hay distritos cargados en el sistema</i></p>
        @endif
      </div>
    </div>
    @endif
    <div class="form-group">
      <label><b>Empresas relacionadas</b> <small class="text-info">Opcional</small></label>
      <div>
        @if(count($companies) > 0) 
          @foreach($companies as $company)
            <div class="custom-control custom-checkbox form-check-inline">
              <input class="custom-control-input" type="checkbox" name="companies[]" id="com{{$company->id}}" :value="{{$company->id}}">
              <label class="custom-control-label" for="com{{$company->id}}">{{$company->name}}</label>
            </div>
          @endforeach
        @else
          <p><i>No hay empresas cargadas en el sistema</i></p>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label><b>Otras metas relacionadas</b> <small class="text-info">Opcional</small></label>
      <div>
        @if(count($objectivesList) > 0) 
          @foreach($objectivesList as $auxObjective)
            <div class="custom-control custom-checkbox form-check-inline">
              <input class="custom-control-input" type="checkbox" name="related_objectives[]" id="ro{{$auxObjective->id}}" :value="{{$auxObjective->id}}">
              <label class="custom-control-label" for="ro{{$auxObjective->id}}">{{$auxObjective->title}}</label>
            </div>
          @endforeach
        @else
         <p><i>No hay otras metas cargadas en el sistema</i></p>
        @endif
      </div>
    </div>
    <div class="border border-light rounded p-3">
      <label class="is-700 "><i class="fas fa-paper-plane"></i>&nbsp;Enviar notificacion a suscriptores</label>
      @if(!$objective->hidden)
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="notify" id="notify" value="true">
        <label class="custom-control-label is-clickable" for="notify">Notificar a los suscriptores</label>
      </div>
      @else
      <div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle"></i>&nbsp;La meta se encuentra <i class="fas fa-eye-slash"></i> oculto, no se enviarán notificaciones a los usuarios.
      </div>
      @endif
      <small class="form-text text-muted">Se le enviará una notificación por email (si lo tienen habilitado) y por sistema, de que hay un nuevo proyecto invitandolos a verlo.</small>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
</section>

@endsection