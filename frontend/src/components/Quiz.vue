<template>
  <div class="quiz">
    <h1 v-html="loading ? 'Loading...' : question.question"></h1>
    <form v-if="question">
      <button
          v-for="answer in question.responses"
          :key="answer"
          v-html="answer.rate"
          @click.prevent="submitResponse(question.id, answer.id)"
      ></button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Quiz',

  data() {
    return {
      loading: false,
      question : {question: 'dummy', responses: ['bagamare', 'bagamare', 'bagamare', 'bagamare']}
    }
  },

  methods: {
    async fetchQuestion() {
      this.axios.get('http://127.0.0.1:8000/api/getQuestion')
          .then(res => {
            this.question = res.data;
          }).catch(error => {
            console.log(error)
          });
        this.loading = false
    },
    submitResponse(questionId,responseId){
      let that = this;
      let postData = {questionId : questionId, responseId: responseId };
      that.axios.post('http://127.0.0.1:8000/api/quizzes' ,postData ).then(function(){
         that.$router.push('/results');
      }).catch(error=>{
            console.log(error);
      });
    }
  },
  mounted() {
    this.fetchQuestion();
  }
}
</script>

<style scoped>
form {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
}

button {
  font-size: 1.1rem;
  box-sizing: border-box;
  padding: 1rem;
  margin: 0.3rem;
  width: 47%;
  background-color: rgba(100, 100, 100, 0.3);
  border: none;
  border-radius: 0.4rem;
  box-shadow: 3px 5px 5px rgba(0, 0, 0, 0.2);
}
</style>