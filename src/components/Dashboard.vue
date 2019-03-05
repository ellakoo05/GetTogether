<template>
  <div id="Dashboard">
    <div id="banner">
      <div class="col-sm-2" style="padding:10px; margin:auto">
        <img src="../assets/title.png" width="100%">
      </div>
      <button id="goBack" @click="goBack">MAIN PAGE</button>
    </div>
    
    <h2>Your Events</h2>

   <div class="container">
  <div class="row align-items-start">
    <div @click="goToEvent(item.eventCode)" class="col-md-2" v-for="item in dashboardList">
      {{item.eventname}}
    </div>
  </div>
  
  <div class="text-center">
      <button @click="createNew" id="new" type="button" class="btn btn-secondary btn-lg">Create New</button>
    </div>
    
  </div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Nunito");
@import "./style.css";
@import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";
</style>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      dashboardList: "",
      isAdmin: false,
      isUser: false,
      userID: this.store.userID
    };
  },
  methods: {
    goBack: function() {
      this.$router.push("mainpage");
    },
    createNew: function() {
      this.$router.push("mainpage");
    },
    goToEvent: function(eventCode) {
      sessionStorage.setItem("eventCode", eventCode);
      this.$router.push("eventpage");
    }
  },
  beforeCreate: async function() {
    var userForm = new FormData();
    userForm.append("userID", sessionStorage.getItem("userID"));

    var resp = await fetch(
      "https://gettogetherbcit.herokuapp.com/mysql/getJoinedEvents.php",
      {
        method: "POST",
        body: userForm
      }
    );
    var json = await resp.json();
    console.log(json);

    this.dashboardList = json;
  }
};
</script>
