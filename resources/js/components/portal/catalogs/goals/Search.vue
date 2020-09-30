<template>
  <section v-if="firstFetch">
    <input type="text" v-model="nameToSearch" class="form-control form-control-lg shadow-sm" placeholder="Buscar por titulo o tags">
    <small class="form-text text-muted">{{status}}</small>
    <section class="my-2">
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'status-active': statusSelected == null}" @click="changeStatus(null)">
        <i class="fas fa-star"></i>&nbsp;Cualquier estado
        </div>
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'status-active': statusSelected == status.id}" v-for="status in statuses" :key="`type-${status.id}`" @click="changeStatus(status.id)">
        <i class="far fa-dot-circle" :style="`color: ${status.color}`"></i>&nbsp;{{status.title}}
        </div>
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'mappeable-active': mappableGoals == true}" @click="mappableGoals = !mappableGoals">
        <i class="fas fa-map-marked-alt text-primary"></i>&nbsp;Mapeable
      </div>
    </section>
    <hr>
    <goal-card class="my-3" v-for="goal in goals" :key="`goal${goal.id}`" :goal="goal"></goal-card>
    <div class="card shadow-sm" v-if="goals.length == 0">
      <div class="card-body p-5 text-center">
            <h6 class="card-title mb-2"><i class="far fa-surprise"></i>&nbsp;¡No se encontraron proyectos con esos criterios de busqueda!</h6>
            <p class="text-smaller mb-0">Intente de nuevo o cambie los criterios de busqueda</p>
      </div>
    </div>
    <hr>
    <paginator v-if="paginatorData.links && !isLoading" :paginatorData="paginatorData" @updateData="updateData" />

  </section>
  <section v-else>
    <slot></slot>
  </section>
</template>

<script>
import debounce from "lodash/debounce";
import GoalCard from './GoalCard'
export default {
  props: ['fetchUrl','querystring'],
  components: {
    GoalCard
  },
  data(){
    return {
      firstFetch: false,
      isLoading: true,
      nameToSearch: "",
      searchableString: null,
      status: 'Comience escribiendo el nombre',
      statusSelected: null,
      mappableGoals: false,
      goals: [],
      paginatorData: {
        links: null,
        meta: null,
      },
      statuses: [
        {
          id: 'reached',
          title: 'Alcanzado',
          color: '#2eda54'
        },
        {
          id: 'ongoing',
          title: 'En progreso',
          color: '#ffa51e'
        },
        {
          id: 'inactive',
          title: 'Inactivo',
          color: '#7e7e7e'
        },
        {
          id: 'delayed',
          title: 'Demorado',
          color: '#f15454'
        },
      ]
    }
  },
  created: function(){
    this.fetchGoals()
  },
  methods: {
    changeStatus: function(statusId){
      this.statusSelected = statusId
      this.fetchGoals();
    },
    fetchGoals:  debounce(
      function(){
        this.isLoading = true
        this.$http.get(this.urlGet)
        .then( response => {
          this.goals = response.data.data
          this.paginatorData = {
            links: response.data.links,
            meta: response.data.meta
          }
          this.firstFetch = true
        })
        .catch( error => {
          this.$toasted.show('Hubo un error cargando los proyectos', {icon: 'exclamation-triangle'})
          console.error(error)
        })
        .finally( () => {
          this.isLoading = false
        })
      }, 600),
    updateData: function(data){
      this.goals = data.data
      this.paginatorData = {
        links: data.links,
        meta: data.meta
      }
    }
  },
  computed: {
    urlGet: function() {
      let query = ['with=goal_objective,goal_reports_count','order_by=updated_at,DESC','size=8'];
      if (this.searchableString != null) {
        query.push("s=" + this.searchableString);
      }
      if (this.statusSelected != null) {
        query.push("status=" + this.statusSelected);
      }
      if (this.mappableGoals == true) {
        query.push("mappable=true");
      }
      return this.fetchUrl.concat(query.length > 0 ? "?" : "", query.join("&"));
    }
  },
  watch: {
    nameToSearch: function(newNameToSearch, oldNameToSearch) {
      this.status = "Tipeando...";
      if (newNameToSearch.length >= 3) {
        this.searchableString = newNameToSearch
        this.fetchGoals();
      }
      else {
        this.searchableString = null
        this.status = "Por favor, escriba más caracteres para la busqueda";
        this.fetchGoals();
      }
    },
    mappableGoals: function(){
      this.fetchGoals()
    }
  }
}
</script>   

<style lang="scss" scoped>
.type-active{
  background-color: #2c59fb !important;
  color: #FFF !important;
  i{
  color: #FFF !important;
  }
}
.status-active{
  background-color: #2c59fb !important;
  color: #FFF !important;
  i{
  color: #FFF !important;
  }
}
.mappeable-active{
  background-color: #2c59fb !important;
  color: #FFF !important;
  i{
  color: #FFF !important;
  }
}
</style>