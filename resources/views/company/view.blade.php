@php

@endphp

@extends('layouts.app')

@section('content')

  <div class="container" style="margin-top: -50px; min-height: 800px">
    <div class="row justify-content-center">
      <div class="col col-sm-10 col-md-8">

      <div class="card mb-3">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-md-auto mb-4 mb-md-0 text-center">
              @if($company->logo)
              <img src="{{ asset($company->logo->path) }}" class="rounded img-fluid" width="175" alt="Logo {{$company->name}}" title="{{$company->name}}" />
              @else
              <img src="{{ asset('img/default-organization.png') }}" class="rounded img-fluid" width="175" alt="Logo {{$company->name}}" title="{{$company->name}}" />
              @endif
            </div>
            <div class="col align-self-center text-center text-md-left">
              <h6>Empresa</h6>
              <h3 class="is-700">{{$company->name}}</h3>
              <div class="text-center text-md-left mt-4">
                <h6>Acerca de</h6>
                <span class="lead">{{$company->description}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h4 class="is-400 mb-3">Proyectos en los que participa</h4>
      @forelse ($company->goals as $goal)
      <div class="card my-3 shadow-sm">
        <div class="card-body">

          <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3 category-icon-container text-center">
              <i class="far fa-2x fa-fw fa-dot-circle text-{{$goal->status}}"></i>
              <span class="text-{{$goal->status}} rounded-circle is-700 text-smallest ">{{$goal->progress_percentage}}%</span>
            </div>
            <div class="w-100">
              <span class="text-{{$goal->status}}">Proyecto {{$goal->status_label}}</span>
              <h5 class="is-700 mb-2">
                <a class="text-dark" href="{{ route('goals.index', ['goalId' => $goal->id]) }}">{{$goal->title}}</a>
              </h5>
              <span class="text-smaller">Meta: <a href="{{route('objectives.index',['objectiveId' => $goal->objective->id])}}" class="text-dark">{{$goal->objective->title}}</a> <span style="color: {{$goal->objective->category->color}}"><i class="fa-fw {{$goal->objective->category->icon}}"></i>{{$goal->objective->category->title}}</span></span>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="card shadow-sm my-3">
        <div class="card-body text-center">
          <i class="far fa-surprise"></i>&nbsp;¡No hay proyectos de la meta!
        </div>
      </div>
      @endforelse
    </div>
  </div>
@endsection