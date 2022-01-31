@component('mail::message')
# ¡Hola {{$user->name}}! 👋

¡Estamos de fiesta! 🥳 ¡La meta ⭐ **{{$goal->title}}** de la objetivo **{{$objective->title}}** llego al 100%!

Podes leer el reporte **{{$report->title}}** donde se publica que la meta avanzó al 100% en la web de Sumen haciendo clic en el botón 👇

@component('mail::button', ['url' => route('reports.index', ['reportId' => $report->id])])
🔍 Ver reporte
@endcomponent

Tambien podes entrar a ver todo acerca de la meta en la web de Sumen haciendo clic en el botón 👇

@component('mail::button', ['url' => route('goals.index', ['goalId' => $goal->id])])
🔍 Ver meta
@endcomponent

Muchas gracias, <br>
{{ config('app.name') }} 😉
@endcomponent
