<template>
<div id="register">
<div class="container">
    <div class="row">
    <div id="leftSide" class="col-lg-6"></div>
    <div id="rightSide">
      <div id="signupBox">
        <h2>Sign Up</h2>
        <hr style="width: 300px;">
        <div class="signupForm">
          <input type="text" name="username" class="inputs" placeholder="username" v-model="username">
          <input type="text" name="email" class="inputs" placeholder="email" v-model="email">
          <input type="password" name="password" class="inputs" placeholder="password" v-model="password">
          <input type="password" name="cfpassword" class="inputs" placeholder="confirm password">
          <button @click="insertUser" id="signupButton">sign up</button>
        </div>
      </div>
    </div>
  </div>
  </div>
    </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";
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
      insertUser: async function() {
        var userForm = new FormData();
        userForm.append("username", this.username);
        userForm.append("email", this.email);
        userForm.append("password", this.password);
        await fetch("https://gettogetherbcit.herokuapp.com/mysql/insertUser.php", {
          method: "POST",
          body: userForm
        }).then((resp) => {
          return resp.json;
        }).then((json) => {
          if (json) {
            this.$router.push('loginpage');
          }
        });
        if (typeof(Storage) !== "undefined") {
          // Store
          sessionStorage.setItem("username", this.username);
          // Retrieve
          document.getElementById("result").innerHTML = sessionStorage.getItem("username");
        }
      }
    },
  }

</script>
