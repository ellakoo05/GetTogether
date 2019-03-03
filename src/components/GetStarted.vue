<template>
  <div id="wrapper" class="d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="container">
      <div class="row">
        <div class="col-lg-10" style="margin:auto; transition:0.2s;">
          <img id="title" src="../assets/title.png" alt="title">
          <img id="titlewave" src="../assets/undertitle4x.png" alt="titlewave">
        </div>
        <div class="col-lg-10" style="margin:auto; margin-top:100px; transition: 0.2s; ">
          <router-link to="/loginpage" tag="button" id="start" class="btn">Get Started</router-link>
        </div>
      </div>
    </div>

    <div class="container d-flex w-100 h-100">
      <div class="row">
        <div class="col-lg-4 colSection">
          <h3>Plan your events with a website you, your family, and your friends can count on</h3>
          <br>
          <img class="icons" src="../assets/svg/customer-review.png" alt="star">
        </div>
        <div class="col-lg-4 colSection">
          <h3>Assign party members with tasks and watch the party plan itself</h3>
          <br>
          <br>
          <img class="icons" src="../assets/svg/magic-wand.png" alt="magic">
        </div>
        <div class="col-lg-4 colSection">
          <h3>Chat and check off tasks as you complete them</h3>
          <br>
          <br>
          <br>
          <img class="icons" src="../assets/svg/list.png" alt="list">
        </div>
      </div>
    </div>
    <div id="footer">GetTogether &copy; 2019</div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Nunito");
@import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";
@import "./style.css";
</style>

<script>
export default {
  name: "login"
};
</script>