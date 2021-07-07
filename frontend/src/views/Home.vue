<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Welcome/>
  </div>
</template>

<script>
import Welcome from "../components/Welcome";

export default {
  name: 'Home',
  components: {
    Welcome,
  }
}
</script>
