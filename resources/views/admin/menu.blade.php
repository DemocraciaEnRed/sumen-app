@php
$currentRoute = Route::currentRouteName();
@endphp

<a href="{{ route('admin.index') }}" class="category {{ $currentRoute == 'objective.manage.goals.reports.index'  ? 'is-active' : null }}"><i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;Inicio</a>
<h6 class="category"><i class="fas fa-tags fa-fw"></i>&nbsp;Ejes de planificación</h6>
<div class="menu-link">
<a href="{{ route('admin.categories.create') }}" class="item-link {{ $currentRoute == 'admin.categories.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Crear</a>
<a href="{{ route('admin.categories.import') }}" class="item-link {{ $currentRoute == 'admin.categories.import' ? 'is-active' : null }}"><i class="fas fa-upload"></i>&nbsp;Importar</a>
<a href="{{ route('admin.categories') }}" class="item-link {{ $currentRoute == 'admin.categories' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="fas fa-tags fa-fw"></i>&nbsp;Distritos</h6>
<div class="menu-link">
<a href="{{ route('admin.districts.create') }}" class="item-link {{ $currentRoute == 'admin.districts.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Crear</a>
<a href="{{ route('admin.districts') }}" class="item-link {{ $currentRoute == 'admin.districts' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="far fa-building fa-fw"></i>&nbsp;Organizaciones</h6>
<div class="menu-link">
<a href="{{ route('admin.organizations.create') }}" class="item-link {{ $currentRoute == 'admin.organizations.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Crear</a>
<a href="{{ route('admin.organizations.import') }}" class="item-link {{ $currentRoute == 'admin.organizations.import' ? 'is-active' : null }}"><i class="fas fa-upload"></i>&nbsp;Importar</a>
<a href="{{ route('admin.organizations') }}" class="item-link {{ $currentRoute == 'admin.organizations' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="fas fa-industry fa-fw"></i>&nbsp;Empresas</h6>
<div class="menu-link">
<a href="{{ route('admin.companies.create') }}" class="item-link {{ $currentRoute == 'admin.companies.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Crear</a>
<a href="{{ route('admin.companies.import') }}" class="item-link {{ $currentRoute == 'admin.companies.import' ? 'is-active' : null }}"><i class="fas fa-upload"></i>&nbsp;Importar</a>
<a href="{{ route('admin.companies') }}" class="item-link {{ $currentRoute == 'admin.companies' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="fas fa-flag-checkered fa-fw"></i>&nbsp;Objetivos</h6>
<div class="menu-link">
<a href="{{ route('admin.objectives.create') }}" class="item-link {{ $currentRoute == 'admin.objectives.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Crear</a>
<a href="{{ route('admin.objectives.import') }}" class="item-link {{ $currentRoute == 'admin.objectives.import' ? 'is-active' : null }}"><i class="fas fa-upload"></i>&nbsp;Importar</a>
<a href="{{ route('admin.objectives') }}" class="item-link {{ $currentRoute == 'admin.objectives' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="far fa-calendar-alt fa-fw"></i>&nbsp;Eventos</h6>
<div class="menu-link">
<a href="{{ route('admin.events.create') }}" class="item-link {{ $currentRoute == 'admin.events.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Crear</a>
<a href="{{ route('admin.events') }}" class="item-link {{ $currentRoute == 'admin.events' ? 'is-active' : null }}">Próximos</a>
<a href="{{ route('admin.events.past') }}" class="item-link {{ $currentRoute == 'admin.events.past' ? 'is-active' : null }}">Celebrados</a>
</div>
<h6 class="category"><i class="fas fa-user-shield fa-fw"></i>&nbsp;Administradores</h6>
<div class="menu-link">
<a href="{{ route('admin.administrators.add') }}" class="item-link {{ $currentRoute == 'admin.administrators.add' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Agregar</a>
  <a href="{{ route('admin.administrators') }}" class="item-link {{ $currentRoute == 'admin.administrators' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="fas fa-question-circle fa-fw"></i>&nbsp;Preguntas Frecuentes</h6>
<div class="menu-link">
<a href="{{ route('admin.faqs.create') }}" class="item-link {{ $currentRoute == 'admin.faqs.create' ? 'is-active' : null }}"><i class="fas fa-plus"></i>&nbsp;Agregar</a>
  <a href="{{ route('admin.faqs') }}" class="item-link {{ $currentRoute == 'admin.faqs' ? 'is-active' : null }}">Listar</a>
</div>
<h6 class="category"><i class="fas fa-cog fa-fw"></i>&nbsp;Administrar</h6>
<div class="menu-link">
<a href="{{ route('admin.logs') }}" class="item-link {{ $currentRoute == 'admin.logs'  ? 'is-active' : null }}">Bitácora de eventos</a>
<a href="{{ route('admin.settings') }}" class="item-link {{ $currentRoute == 'admin.settings'  ? 'is-active' : null }}">Configuración</a>
</div>