@component('mail::message')
# ¡Hola {{$user->name}}! 👋

¡Estamos de fiesta! 🥳 ¡El proyecto ⭐ **{{$goal->title}}** de la meta **{{$objective->title}}** llego al 100%!

Podes leer el reporte **{{$report->title}}** donde se publica que el proyecto avanzó al 100% en la web de Sumen haciendo clic en el botón 👇

@component('mail::button', ['url' => route('reports.index', ['reportId' => $report->id])])
🔍 Ver reporte
@endcomponent

Tambien podes entrar a ver todo acerca de el proyecto en la web de Sumen haciendo clic en el botón 👇

@component('mail::button', ['url' => route('goals.index', ['goalId' => $goal->id])])
🔍 Ver proyecto
@endcomponent

Muchas gracias, <br>
{{ config('app.name') }} 😉
@endcomponent
