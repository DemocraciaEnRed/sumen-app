@component('mail::message')
# ¡Atención {{$user->name}}! 👏👏

Tenemos que informarte que han **eliminado** la meta **{{$objective->title}}** en Sumen.

Como estas suscripto a la meta, nos parecio importante avisarte. 😮

Muchas gracias, <br>
{{ config('app.name') }} 😉
@endcomponent