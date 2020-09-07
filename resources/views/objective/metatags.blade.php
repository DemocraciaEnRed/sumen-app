<!-- Primary Meta Tags -->
<title>{{$objective->title}} - Sumen - Monitoreo Ciudadano</title>
<meta name="title" content="{{$objective->title}} - Sumen - Monitoreo Ciudadano">
<meta name="description" content="¡Conocé acerca de la meta y monitorealo entrando en Sumen!">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{route('objectives.index',['objectiveId' => $objective->id])}}">
<meta property="og:title" content="{{$objective->title}} - Sumen - Monitoreo Ciudadano">
<meta property="og:description" content="¡Conocé acerca de la meta y monitorealo entrando en Sumen!">
<meta property="og:image" content="{{URL::to('/')}}/sharer01.png">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{route('objectives.index',['objectiveId' => $objective->id])}}">
<meta property="twitter:title" content="{{$objective->title}} - Sumen - Monitoreo Ciudadano">
<meta property="twitter:description" content="¡Conocé acerca de la meta y monitorealo entrando en Sumen!">
<meta property="twitter:image" content="{{URL::to('/')}}/sharer01.png">