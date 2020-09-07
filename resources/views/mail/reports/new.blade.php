@component('mail::message')
# ¡Hola {{$user->name}}! 👋

¡Te comentamos que hay un nuevo reporte 📝 de {{$report->type_label}} en el proyecto **{{$goal->title}}** de la meta **{{$objective->title}}** al cual estás suscripto!

🙌 Podes ver el reporte de {{$report->type_label}} **{{$report->title}}** entrando en la web de Sumen haciendo clic en el botón 👇

@component('mail::button', ['url' => route('reports.index', ['reportId' => $report->id])])
🔍 Ver reporte
@endcomponent

Muchas gracias, <br>
{{ config('app.name') }} 😉
@endcomponent