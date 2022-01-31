<template>
  <div class="card rounded shadow-sm">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <div :class="`mr-4 text-center d-none d-md-block text-${goal.status}`">
          <i class="far fa-dot-circle fa-2x"></i>
        </div>
        <div class="w-100">
          <p :class="`mb-1 text-${goal.status}`"><span class="d-md-none"><i class="far fa-dot-circle"></i>&nbsp;</span>Meta {{goal.status_label}}</p>
          <h5 class="my-1"><a :href="goal.url" class="text-dark is-700">{{goal.title}}</a></h5>
          <!-- <p class="m-0 text-muted text-smaller" v-if="goal.objective.tags && goal.objective.tags.length > 0">Tags: {{goal.objective.tags && goal.objective.tags.join(' / ')}}</p>
          <p class="m-0 text-muted text-smaller" v-else>Tags: Sin tags cargados</p> -->
          <p class="m-0 text-muted text-smaller">Meta: <a :href="goal.objective.url" class="text-muted">{{goal.objective.title}}</a></p>
          <p class="m-0 text-muted text-smaller" >Progreso: {{ goal.indicator_progress }} de {{ goal.indicator_goal }} ({{goal.indicator_unit}})</p>
          <p class="m-0 text-muted text-smaller" v-if="goal.districts.length > 0">Distritos: {{goal.districts.join(' / ')}}</p>
          </div>
        <div class="mx-1 d-flex flex-column flex-md-row">
          <div class="text-center m-2" v-if="goal.map_zoom">
            <span class="is-700 is-size-5"><i class="fas fa-map-marked-alt fa-fw text-primary"></i></span><br><span class="text-smaller">Mapeable</span>
          </div>
          <div class="text-center m-2">
            <span class="is-700 is-size-5 text-info     ">{{goal.progress_percentage}}%</span><br><span class="text-smaller">Progreso</span>
          </div>
          <div class="text-center m-2">
            <span class="is-700 is-size-5"><i class="far fa-file fa-fw text-primary"></i>&nbsp;{{goal.reports_count}}</span><br><span class="text-smaller">Reportes</span>
          </div>
          <!-- <div class="text-center m-2">
            <span class="is-700 is-size-5"><i class="fas fa-thumbs-up fa-fw text-primary"></i>&nbsp;{{report.positive_testimonies_count}}</span><br><span class="text-smaller">Feedbacks</span>
          </div> -->
        </div>
          <div class="ml-2 align-self-center">
            <a :href="goal.url" class="text-primary"><i class="fas fa-2x fa-fw fa-arrow-alt-circle-right"></i></a>
          </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: ['goal'],
  data(){
    return {
     
    }
  },
  components: {
    
  },
  computed: {
    
  }
}
</script>

<style>

</style>