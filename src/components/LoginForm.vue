<template>
<div id="login">
  <div>
    <div id="leftSide"></div>
    <div id="rightSide">
      <div id="signupBox">
        <h2>login</h2>
        <hr style="width: 300px;">
        <form class="signupForm" method="get" id="userRegistration">
          <input type="text" name="username" class="inputs" placeholder="username">
          <input type="text" name="email" class="inputs" placeholder="email">
          <input type="text" name="password" class="inputs" placeholder="password">
          <router-link to="/mainpage" tag="button" id="partyButton">let's party!</router-link>
          <router-link to="/signuppage" tag="button" id="signupButton">sign up</router-link>
        </form>
      </div>
    </div>
    </div>
  </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>

<script>
  export default {
    name: "login"
  }
</script>