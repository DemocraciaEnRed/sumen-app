@php
    $heightHeader = 400
@endphp

@section('stylesheets')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('headscripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js'></script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container push-to-header" style="margin-top: -350px">
    @if(app_setting('app_home_district_dropdown_enable') || app_setting('app_home_custom_dropdown_enable'))
  <div class="row justify-content-between mb-3 mb-md-4">
    <div class="col-md-5 text-center text-md-left mb-3 mb-md-0">
    @else
  <div class="row justify-content-center mb-3 mb-md-4">
    <div class="col-sm-10 col-md-8 col-lg-6 text-center mb-3 mb-md-0 self-align-center">
    @endif
      <img src="{{asset(app_setting('app_logo_white','img/default-logo-white.svg'))}}" class="img logo-home mb-2" alt="{{ config('app.name', 'Laravel') }}">
      <h5 class="text-white">{{app_setting('app_home_subtitle')}}</h5>
      <a href="{{route('about.general')}}" class="btn btn-success mt-2">Conocer más <i class="fas fa-arrow-right ml-2"></i></a>
    </div>
    @if(app_setting('app_home_district_dropdown_enable'))
    <div class="col-md-5 text-center text-md-right align-self-center">
      <h5 class="text-white">Conoce las metas por distrito</h5>
      <div class="row">
        <div class="col mb-4 text-center text-md-right">
          <div class="dropdown">
            <button class="btn btn-lg btn-icon text-white is-size-4 is-700" type="button" id="districtDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Elegí un distrito <i class="fas fa-chevron-down ml-3"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="districtDropdown">
              @foreach ($districts as $district)
              <a class="dropdown-item" href="{{route('goals',['districtId' => $district->id])}}" target="_blank">{{$district->name}}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if(app_setting('app_home_custom_dropdown_enable'))
    <div class="col-md-5 text-center text-md-right align-self-center">
      <h5 class="text-white">{{app_setting('app_home_custom_dropdown_subtitle')}}</h5>
      <div class="row">
        <div class="col mb-4 text-center text-md-right">
          <div class="dropdown">
            <button class="btn btn-lg btn-icon text-white is-size-4 is-700" type="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{app_setting('app_home_custom_dropdown_placeholder')}} <i class="fas fa-chevron-down ml-3"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
              @foreach( app_setting('app_home_custom_dropdown_options') as $dropdownOptionLabel => $dropdownOptionUrl)
              <a class="dropdown-item" href="{{$dropdownOptionUrl}}" target="_blank">{{$dropdownOptionLabel}}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
  <div class="row mb-4">
    <div class="col-md-5 col-lg-4 mb-2 mb-md-0">
      <div class="card rounded shadow-sm">
        <div class="card-body text-center">
          <p><b>Resumen</b></p>
          <p><span class="h3 is-700"><i class="fas fa-bullseye text-info"></i>&nbsp{{$countObjectives}}</span><br>Metas publicadas</p>
          <div class="row">
            <div class="col">
              <p><span class="h3 is-700"><i class="fas fa-medal text-primary"></i>&nbsp;{{$countGoals}}</span><br>Proyectos publicados</p>
            </div>
            <div class="col">
              <p><span class="h3 is-700"><i class="fas fa-check text-success"></i>&nbsp{{$countGoalsCompleted}}</span><br>Proy. completados</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-lg-8">
      <div class="card rounded shadow-sm">
        <div class="card-body">
          <p><b>Estado de los proyectos</b></p>
          <portal-home-stats fetch-url="{{route('apiService.home.stats')}}">
            @include('partials.loading')
          </portal-home-stats>
        </div>
      </div>
    </div>
  </div>
  <h4 class="is-400 mb-3">Ultimos reportes publicados</h4>
  <portal-home-reports-carrousel fetch-url="{{route('apiService.reports',['order_by'=>'updated_at,DESC'])}}"></portal-home-reports-carrousel>
  <p class="mb-4 text-right"><a href="{{route('reports')}}" class="btn btn-outline-primary">Ver más reportes <i class="fas fa-arrow-right"></i></a></p>
  <h4 class="is-400 mb-3">Ultimas metas actualizadas</h4> 
  <portal-last-objectives fetch-url="{{route('apiService.objectives',['order_by'=>'updated_at,DESC','with'=>'objective_latest_goals,objective_latest_reports,objective_stats,','size' => 5])}}"></portal-last-objectives>
  <p class="mb-4 text-right"><a href="{{route('objectives')}}" class="btn btn-outline-primary">Ver más metas <i class="fas fa-arrow-right"></i></a></p>
  <h4 class="is-400 mb-3">Ultimos 15 proyectos geolocalizados</h4>
  {{-- <map-reports fetch-url="{{route('apiService.reports',['mappable' => true, 'size'=> 15])}}" access-token="{{config('services.mapbox.key')}}" :paginated="false" map-style="{{config('services.mapbox.style')}}"> --}}
  <map-goals fetch-url="{{route('apiService.goals',['mappable' => true, 'size'=> 15, 'order_by'=>'updated_at,DESC', 'with' => 'goal_objective'])}}" access-token="{{config('services.mapbox.key')}}" :paginated="false" :lat="{{app_setting('app_map_lat_default')}}" :long="{{app_setting('app_map_long_default')}}" :zoom="{{app_setting('app_map_zoom_default')}}" map-style="{{config('services.mapbox.style')}}"></map-goals>

</div>
@endsection