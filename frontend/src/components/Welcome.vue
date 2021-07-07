<template>
<div>
  <h1>Quizz app</h1>
  <button @click="$router.push('/quiz')">Take me to the quiz</button>
  <button @click="showResponses">Show responses</button>
</div>
</template>

<script>
export default {
  name: "Welcome",
  methods: {
    showResponses(){
      this.$router.push('/results');
    }
  }
}
</script>

<style scoped>

</style>