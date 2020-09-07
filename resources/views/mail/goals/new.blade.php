@component('mail::message')
# ¡Hola {{$user->name}}! 👋

¡Te comentamos que hay un nuevo proyecto ⭐ en la meta **{{$objective->title}}** al cual estás suscripto!

@component('mail::panel')
# 🎯 **{{$goal->title}}**

**Acerca del indicador**  

{{Str::limit($goal->indicator, 200, $end=' [...]')}}
@endcomponent

@component('mail::table')
| Acerca de | Valor |
|:--------:|:--------:|
| **Estado** | {{$goal->status_label }} |
| **Valor a alcanzar** | {{$goal->indicator_goal }} |
| **Unidad del indicador** | {{$goal->indicator_unit }} |
| **Frecuencia** | {{$goal->indicator_frequency }} |
@endcomponent

El nuevo proyecto 🎯 **{{$goal->title}}** y podes entrar a ver todo acerca del mismo en la web de Sumen haciendo clic en el botón 👇

@component('mail::button', ['url' => route('goals.index', ['goalId' => $goal->id])])
🔍 Ver proyecto
@endcomponent

@if(!$goal->milestones->isEmpty())
Estos son los hitos con la cual el proyecto fue creado

@component('mail::table')
| Hitos |
|:-----:|
@foreach ($goal->milestones as $milestone)
| 🏆 {{$milestone->title}} |
@endforeach
@endcomponent
@endif

Muchas gracias, <br>
{{ config('app.name') }} 😉
@endcomponent
