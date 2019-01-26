<template>
  <div class="home">
   <router-link to="/loginpage" tag="button" id="navButton">W E L C O M E</router-link>
  </div>
</template>

<script>
// @ is an alias to /src
import LoginPage from "@/components/LoginForm.vue";

export default {
  name: 'home',
  components: {
    LoginPage
  }
}
</script>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  body {
    background-image: url("../assets/party.jpg");
    background-size: cover;
  }
  
  #navButton {
    font-family: Nunito;
    font-size: 20px;
    padding: 10px;
    border-radius: 40px;
    border: none;
    color: indianred;
    background-color: white;
    position: absolute;
    top: 0;
    left:0;
    right:0;
    bottom: 0;
    margin: auto;
    width: 200px;
    height: 70px;
  }
</style>
