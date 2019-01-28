<template>
<div id="register">
    <div id="leftSide"></div>
    <div id="rightSide">
      <div id="signupBox">
        <h2>Sign Up</h2>
        <hr style="width: 300px;">
        <form class="signupForm" method="post" action="http://localhost/insertusers.php">
          <input type="text" name="username" class="inputs" placeholder="username" v-model="username">
          <input type="text" name="email" class="inputs" placeholder="email" v-model="email">
          <input type="password" name="password" class="inputs" placeholder="password" v-model="password">
          <input type="password" name="cfpassword" class="inputs" placeholder="confirm password">
          <input @click="userFetch" id="signupButton" type="submit">
        </form>
      </div>
    </div>
    </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>

<script>
  import Main from "@/components/EventForm.vue";
  
  export default {
    name: "signup",
    components: {
      Main: Main
    },
    data() {
      return {
        username: "",
        email: "",
        password: "",
        page: 0
      }
    },
    methods: {
      userFetch: function() {
        alert("Welcome " + this.username);
      }
    }
  }
</script>