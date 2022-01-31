<template>
  <section>
    <mapbox
      :access-token="accessToken"
      :map-options="mapOption"
      @map-init="mapInitialized"
      @map-load="mapLoaded"
    />
    <div class="alert alert-dark my-3" v-if="currentMarkers.length == 0 && !isLoading">
      <i class="fas fa-info-circle"></i>&nbsp; No hay metas geolocalizadas
    </div>
    <paginator class="mt-3" v-if="paginatorData.meta && paginatorData.meta.last_page > 1 && paginated" :paginatorData="paginatorData" @updateData="updateData" />
  </section>
</template>

<script>
import Mapbox from 'mapbox-gl-vue'

export default {
  props: {
    fetchUrl: {
      type: String,
      required: true,
    },
   accessToken: {
     type: String,
     required: true
   },
   mapStyle: {
     type: String,
     required: true
   },
   lat: {
     type: Number,
     default: -36.13810,
   },
   long: {
     type: Number,
     default: -63.67392,
   },
   zoom: {
     type: Number,
     default: 4
   },
   paginated: {
     type: Boolean,
     default: true
   }
  },
  components: { Mapbox },
  data() {
    return {
      mapOption: {
        style: this.mapStyle,
        center: [this.long, this.lat],
        zoom: this.zoom,
      },
      map: null,
      isLoading: true,
      goals: [],
      paginatorData: {
        links: null,
        meta: null,
      },
      currentMarkers: [],
    }
  },
  methods: {
    fetchGoals: function(){
      this.isLoading = true
      this.$http.get(this.fetchUrl)
      .then( response => {
        this.goals = response.data.data
        this.paginatorData = {
            links: response.data.links,
            meta: response.data.meta
          }
        this.addMarkers();
      })
      .catch( error => {
        console.error(error)
      })
      .finally( () => {
        this.isLoading = false
      })
    },
    mapInitialized: function(map) {
      this.map = map
    },
    mapLoaded: function(map){
      this.fetchGoals();
    },
    addMarkers: function(){
      if(this.currentMarkers.length){
        this.currentMarkers.forEach( marker => {
          marker.remove();
        })
      }
      this.currentMarkers = this.goals.map( goal => {
        let el = document.createElement('div');
        el.className = `goal-marker bg-${goal.status}`;

        // create the popup
        let theHtml = `<div class="goal-popup">`
        theHtml += `<div class="clearfix mb-2"><span class="float-left"><i class="${goal.objective.category.icon} fa-lg" style="color:${goal.objective.category.color}"></i></span><span class="float-right text-smaller text-${goal.status}"><i class="far fa-dot-circle"></i>&nbsp;${goal.status_label}</span></div>`
        theHtml += `<p class="goal-title mb-3"><a href="${goal.url}" class="text-primary" target="_blank">${goal.title}</a></p>`
        theHtml += `<p class="text-smaller text-muted mb-0">Progreso: ${goal.indicator_progress} de ${goal.indicator_goal} (${goal.indicator_unit}) - <span class="text-info">${goal.progress_percentage} %</span></p>`
        theHtml += `</div>`
        let popup = new mapboxgl.Popup({ offset: 25 }).setHTML(theHtml);

        let marker = new mapboxgl.Marker(el).setLngLat([goal.map_long,goal.map_lat]).setPopup(popup).addTo(this.map)
        return marker
      })
    },
    updateData: function(data){
      this.goals = data.data
      this.paginatorData = {
        links: data.links,
        meta: data.meta
      }
      this.addMarkers();
    }
  },
}
</script>

<style lang="scss" scoped>
#map {
  width: 100%;
  height: 500px;
}
</style>