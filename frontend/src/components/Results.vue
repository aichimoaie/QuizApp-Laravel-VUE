<template>
  <div>
    <div v-if="loading">Loading..</div>
    <div v-else>
      <div v-for="(result, index) in results"
           :key="result">
        {{(index +10).toString(36).toUpperCase()}} . {{result.rate.charAt(0).toUpperCase() + result.rate.slice(1)}} {{ ((result.count *100)/totalResults).toFixed(2)}}% - {{result.count}} result<span v-if="result.count >1">s</span>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  name: "Results",
  data() {
    return {
      results: [],
      totalResults: 0,
      loading: true,
    }
  },
  methods: {
    async fetchData() {

      this.axios.get('http://127.0.0.1:8000/api/quizzes')
          .then(res=>{
            this.results= res.data;
            this.totalResults= this.results.reduce(function(tot, arr) {
              return tot + arr.count;
            },0);
          }).catch(error=>{
        console.log(error)
      }).finally()
      {
        this.loading=false
      }
    }
  },
  mounted() {
    this.fetchData();

  },
  unmounted() {
    this.loading=true;
  }
}
</script>

<style scoped>

</style>