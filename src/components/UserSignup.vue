<template>
<div id="register">
    <div id="leftSide"></div>
    <div id="rightSide">
      <div id="signupBox">
        <h2>Sign Up</h2>
        <hr style="width: 300px;">
        <form class="signupForm" method="post" action="insertusers.php">
          <input type="text" name="username" class="inputs" placeholder="username" v-model="username">
          <input type="text" name="email" class="inputs" placeholder="email">
          <input type="password" name="password" class="inputs" placeholder="password">
          <input type="password" name="cfpassword" class="inputs" placeholder="confirm password">
          <input @click="inputUsers" type="submit" value="Submit" id="signupButton" placeholder="submit"/>
        </form>
      </div>
    </div>
  <div id="welcomePopup" v-if="page===1"/>
    </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>

<script>
  export default {
    name: "signup",
    data() {
      return {
        username: "",
        email: "",
        password: ""
      }
    },
    methods: {
      }
    }
</script>