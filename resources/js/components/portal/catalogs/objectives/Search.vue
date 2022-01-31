<template>
  <section v-if="firstFetch">
    <div class="form-group">

    <input type="text" v-model="nameToSearch" class="form-control form-control-lg shadow-sm" placeholder="Buscar por titulo o tags">
    <small class="form-text text-muted">{{status}}</small>
    </div>
    <h6><b>Eje de planificación</b></h6>
    <section class="my-2">  
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'category-active': categorySelected == null}" @click="changeCategory(null)">
        <i class="fas fa-star"></i>&nbsp;Todos
        </div>
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'category-active': categorySelected == category.id}" v-for="category in categories" :key="`category${category.id}`" @click="changeCategory(category.id)">
        <i :class="category.icon" :style="`color:${category.color}`"></i>&nbsp;{{category.title}}
        </div>
    </section>
    <h6><b>Estado</b></h6>
    <section class="my-2">  
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'status-active': completedStatusSelected == null}" @click="changeCompletedStatus(null)">
        <i class="fas fa-star"></i>&nbsp;Cualquier estado
        </div>
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'status-active': completedStatusSelected == 1}" @click="changeCompletedStatus(1)">
        <i class="fas fa-check-circle text-success"></i>&nbsp;Completada
        </div>
      <div class="d-inline-block bg-white py-2 px-4 my-1 border rounded shadow-sm mr-2 is-clickable" :class="{'status-active': completedStatusSelected == 0}" @click="changeCompletedStatus(0)">
        <i class="fas fa-times-circle text-danger"></i>&nbsp;No completada
        </div>
    </section>
    <hr>
    <objective-card class="my-3" v-for="objective in objectives" :key="`objective${objective.id}`" :objective="objective"></objective-card>
    <div class="card shadow-sm" v-if="objectives.length == 0">
      <div class="card-body p-5 text-center">
            <h6 class="card-title mb-2"><i class="far fa-surprise"></i>&nbsp;¡No se encontraron objetivos con esos criterios de busqueda!</h6>
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
import ObjectiveCard from './ObjectiveCard'
export default {
  props: ['fetchUrl','categories'],
  components: {
    ObjectiveCard
  },
  data(){
    return {
      firstFetch: false,
      isLoading: true,
      nameToSearch: "",
      searchableString: null,
      status: 'Comience escribiendo el nombre',
      categorySelected: null,
      completedStatusSelected: null,
      objectives: [],
      paginatorData: {
        links: null,
        meta: null,
      },
    }
  },
  created: function(){

    this.fetchObjectives()
  },
  methods: {
    changeCategory: function(categoryId){
      this.categorySelected = categoryId
      this.fetchObjectives();
    },
    changeCompletedStatus: function(completedStatusId){
      this.completedStatusSelected = completedStatusId
      this.fetchObjectives();
    },
    fetchObjectives:  debounce(
      function(){
        this.isLoading = true
        this.$http.get(this.urlGet)
        .then( response => {
          this.objectives = response.data.data
          this.paginatorData = {
            links: response.data.links,
            meta: response.data.meta
          }
          this.firstFetch = true
        })
        .catch( error => {
          this.$toasted.show('Hubo un error cargando los objetivos', {icon: 'exclamation-triangle'})
          console.error(error)
        })
        .finally( () => {
          this.isLoading = false
        })
      }, 1000),
    updateData: function(data){
      this.objectives = data.data
      this.paginatorData = {
        links: data.links,
        meta: data.meta
      }
    }
  },
  computed: {
    urlGet: function() {
      let query = ['with=objective_stats','size=8'];
      if (this.searchableString != null) {
        query.push("s=" + this.searchableString);
      }
      if (this.completedStatusSelected != null) {
        query.push("completed=" + this.completedStatusSelected);
      }
      if (this.categorySelected != null) {
        query.push("category=" + this.categorySelected);
      }
      return this.fetchUrl.concat(query.length > 0 ? "?" : "", query.join("&"));
    }
  },
  watch: {
    nameToSearch: function(newNameToSearch, oldNameToSearch) {
      this.status = "Tipeando...";
      if (newNameToSearch.length >= 3) {
        this.searchableString = newNameToSearch
        this.fetchObjectives();
      }
      else {
        this.searchableString = null
        this.status = "Por favor, escriba más caracteres para la busqueda";
        this.fetchObjectives();
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.category-active{
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
.district-active{
  background-color: #2c59fb !important;
  color: #FFF !important;
}
</style>