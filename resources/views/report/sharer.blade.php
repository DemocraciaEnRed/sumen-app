
@php
  $sharerLink = urlencode(route('reports.index',['reportId'=> $report->id]))
@endphp

<div class="card shadow-sm my-3">
  <div class="card-body p-3 py-lg-4 px-lg-5 d-flex justify-content-between align-items-center">
    <h5 class="is-700 m-0">¡Compartí este reporte en redes sociales!</h5>
    <div class="ml-3 text-right" style="min-width: 130px;">
      <a href="https://facebook.com/sharer.php?u={{$sharerLink}}" target="_blank" class="d-inline-block mx-2 text-success"><i class="fab fa-facebook-f fa-2x"></i></a>
      <a href="https://twitter.com/intent/tweet?url={{$sharerLink}}" target="_blank" class="d-inline-block mx-2 text-success"><i class="fab fa-twitter fa-2x"></i></a>
      <a href="https://linkedin.com/shareArticle?mini=true&url={{$sharerLink}}" target="_blank" class="d-inline-block mx-2 text-success"><i class="fab fa-linkedin-in fa-2x"></i></a>
    </div>
  </div>
</div>
  