@extends('admin.master')

@section('adminContent')

<section>
  <h3 class="is-700">Empresas</h3>
  <p class="lead">Las empresas se asocian a metas. Para eso, deben estar indexadas en el sistema. En esta sección se listan las empresas cargadas en el sistema.</p>
  @forelse($companies as $company)
  <div class="card mb-3 shadow-sm">
    <div class="card-body d-flex align-items-start">
        <div class="mr-4">
          @if($company->logo)
          <img src="{{ asset($company->logo->path) }}" class="rounded" width="75" alt="Logo {{$company->name}}" title="{{$company->name}}" />
          @else
          <img src="{{ asset('img/default-organization.png') }}" class="rounded" width="75" alt="Logo {{$company->name}}" title="{{$company->name}}" />
          @endif
        </div>
        <div class="w-100">
          <h4 class="is-700">{{ $company->name }}</h4>
          <span class="text-smaller text-muted">{{ $company->description }}</span>
          <div class="text-right">
          </div>
        </div>
        <div class="text-right">
          <a href="{{ route('admin.companies.edit', ['companyId' => $company->id]) }}" class="btn btn-link btn-sm"><i class="fas fa-pencil-alt fa-fw"></i>Editar</a>
          <a href="{{ route('admin.companies.delete', ['companyId' => $company->id]) }}" class="btn btn-link btn-sm"><i class="fas fa-trash fa-fw"></i>Eliminar</a>
        </div>
    </div>
  </div>
  @empty
  <div class="card my-3 shadow-sm">
      <div class="card-body text-center">
        <h6>No hay empresas creados</h6>
      </div>
    </div>
  @endforelse
  {{ $companies->links() }}

</section>

@endsection
