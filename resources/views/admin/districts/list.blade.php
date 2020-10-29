@extends('admin.master')

@section('adminContent')

<section>
  <h3 class="is-700">Distritos</h3>
  <p class="lead">Los distritos se asocian a las metas. Aquí una lista de distritos</p>
  @forelse($districts as $district)
  <div class="card mb-3 shadow-sm">
    <div class="card-body d-flex align-items-start">
        <div class="w-100">
          <h4 class="is-700">{{ $district->name }}</h4>
        </div>
        <div class="text-right">
          <a href="{{ route('admin.districts.edit', ['districtId' => $district->id]) }}" class="btn btn-link btn-sm"><i class="fas fa-pencil-alt fa-fw"></i>Editar</a>
          <a href="{{ route('admin.districts.delete', ['districtId' => $district->id]) }}" class="btn btn-link btn-sm"><i class="fas fa-trash fa-fw"></i>Eliminar</a>
        </div>
    </div>
  </div>
  @empty
  <div class="card my-3 shadow-sm">
      <div class="card-body text-center">
        <h6>No hay distrito creados</h6>
      </div>
    </div>
  @endforelse
  {{ $districts->links() }}

</section>

@endsection
