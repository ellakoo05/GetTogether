<template>
<div id="getStarted">
  <div id="wrapper">
    <div style="transition:0.2s;">
      <img id="title" src="../assets/title.png" alt="title">
      <img id="titlewave" src="../assets/undertitle4x.png" alt="titlewave"></div>
    
    <div id="middle">
    <router-link to="/loginpage" tag="button" id="start" class="btn">Get Started</router-link>
    <div id="container">
      <div class="col" id="1">
        <h3>Plan your events with a website you, your family, and your friends can count on</h3>
        <br>
        <img class="icons" src="../assets/svg/customer-review.png" alt="star"/>
  </div>
      <div class="col" id="2">
        <h3>Assign party members with tasks and watch the party plan itself</h3>
        <br>
        <img class="icons" src="../assets/svg/magic-wand.png" alt="magic"/>
  </div>
      <div class="col" id="3">
        <h3>Chat and check off tasks as you complete them</h3>
        <br>
        <img class="icons" src="../assets/svg/list.png" alt="list">
  </div>
  </div>
    <div id="footer">GetTogether &copy; 2019</div>
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