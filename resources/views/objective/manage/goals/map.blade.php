@php
$geometry = $goal->map_geometries ?: 'undefined';
$lat = $goal->map_lat ?: ($objective->map_lat ?: 'undefined');
$long = $goal->map_long ?: ($objective->map_long ?: 'undefined');
$zoom = $goal->map_zoom ?: ($objective->map_zoom ?: 'undefined');
@endphp

@extends('objective.manage.goals.master')

@section('stylesheets')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css' rel='stylesheet' />
<link href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.css' rel='stylesheet' type='text/css' />
@endsection

@section('headscripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.js'></script>
@endsection


@section('panelContent')

<section>
  <h3 class="is-700">Mapa del proyecto</h3>
  <p class="lead">Aqui puede crear puntos, areas, o lineas que tengan que ver con el reporte publicado</p>
   <hr />
    <form action="{{route('objectives.manage.goals.map.form',['objectiveId' => $objective->id, 'goalId' => $goal->id])}}" method="POST">
      @method('PUT')
      @csrf
      <draw-map access-token="{{config('services.mapbox.key')}}" map-style="{{config('services.mapbox.style')}}" :lat="{{$lat}}" :long="{{$long}}" :zoom="{{$zoom}}" :init-collection="{{$geometry}}" />
    </form>
</section>

@endsection
