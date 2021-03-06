

@extends('objective.manage.master')

@section('stylesheets')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('headscripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js'></script>
@endsection

@section('panelContent')

<section>
  <h3 class="is-700">Configuración</h3>
  <p class="lead">A continuación, encontrarás otras opciones de configuracion de la meta</p>
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
  <h5 class="font-weight-bold"><i class="fas fa-flag-checkered"></i> Marcar como meta completa</h5>
  <p>Al completar la meta, ocurre lo siguiente</p>
  <ul>
    <li>La meta se mostrara con una etiqueta de "Completada"</li>
    <li>La accion no hace que los proyectos de la meta esten "Alcanzados", es independiente del estado de los mismos</li>
  </ul>
  <form action="{{ route('objectives.manage.configuration.complete.form',['objectiveId' => $objective->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="completed" id="isCompleted" {{$objective->completed ? 'checked' : ''}} value="true">
        <label class="custom-control-label is-clickable" for="isCompleted">Meta completada</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  <hr>
  <h5 class="font-weight-bold"><i class="far fa-eye"></i> Ocultar meta</h5>
  <p>Al ocultar la meta, ocurre lo siguiente</p>
  <ul>
    <li>La meta deja de ser visible publicamente</li>
    <li>Administradores y miembros del equipo pueden acceder al panel de control de la meta</li>
    <li>Coordinadores pueden volver a hacer visible la meta</li>
    <li>Miembros del equipo pueden crear reportes, pero los suscriptores no serán notificados</li>
    <li>Coordinadores pueden seguir creando proyectos.</li>
  </ul>
  <form action="{{ route('objectives.manage.configuration.hide.form',['objectiveId' => $objective->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="hidden" id="isHidden" {{$objective->hidden ? 'checked' : ''}} value="true">
        <label class="custom-control-label is-clickable" for="isHidden">Ocultar meta</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  <hr>
  <form action="{{ route('objectives.manage.configuration.map.form',['objectiveId' => $objective->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <h5 class="font-weight-bold"><i class="far fa-eye"></i> Definir centro y zoom por defecto del mapa</h5>
    <p>Defina el centro y zoom por defecto del mapa, para asegurar que los reportes de la meta se vean de forma contenida dentro del area del mapa</p>
    <set-map-default access-token="{{config('services.mapbox.key')}}" map-style="{{config('services.mapbox.style')}}" :lat="{{$objective->map_lat ?: 'undefined'}}" :long="{{$objective->map_long ?: 'undefined'}}" :zoom="{{$objective->map_zoom ?: 'undefined'}}"></set-map-default>
  </form>
  <hr>
  <h5 class="is-700 has-text-danger"><i class="fas fa-trash"></i> Eliminar meta</h5>
  <p>Al eliminar la meta, tenga en cuenta lo siguiente</p>
  <ul>
    <li>La meta deja de ser visible publicamente</li>
  </ul>
  <form action="{{ route('objectives.manage.delete.form',['objectiveId' => $objective->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="form-group">
      <label>Ingrese su contraseña</label>
      <input type="password" class="form-control" name="password">
      <small class="form-text text-muted">Para poder eliminar la meta, ingrese su contraseña para confirmar.</small>
    </div>
    <div class="form-group">
     <label class="is-700 "><i class="fas fa-paper-plane"></i>&nbsp;Enviar notificación a suscriptores</label>
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
      <small class="form-text text-muted">Se le enviará una notificación por email (si lo tienen habilitado) y por sistema, de que la meta ha sido eliminado.</small>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>
</section>

@endsection
