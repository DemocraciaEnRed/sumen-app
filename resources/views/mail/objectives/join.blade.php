@component('mail::message')
# ¡Hola {{$user->name}}! 👋

¡Felicidades! 🥳 Te han agregado como parte del equipo de la meta **{{$objective->title}}**.

Tu nuevo rol en el equipo es de {{$role}}.

Podrás acceder al panel de administracion de la meta entrando a *Mi panel / Mis metas*  o haciendo clic en el siguiente botón

@component('mail::button', ['url' => route('panel.objectives')])
🔍 Ver mis metas
@endcomponent 

Por último, te comentamos que automáticamente te hemos suscripto a las notificaciones de la meta.

Muchas gracias, <br>
{{ config('app.name') }} 😉
@endcomponent
