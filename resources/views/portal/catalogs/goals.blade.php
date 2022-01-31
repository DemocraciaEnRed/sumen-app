@php
    $heightHeader = 100
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="py-5">
  <h3 class="is-700 mb-3">Catálogo de metas</h3>
  <search-goals fetch-url="{{route('apiService.goals')}}" :districts='@json($districts)' force-district="{{$forceDistrict}}" enable-districts="{{config('services.sumen.districts')}}">
    @include('partials.loading')
  </search-goals>
  </div>
</div>
@endsection