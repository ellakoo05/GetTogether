<template>
<div id="Dashboard">
  <div id="banner">
    <div class="col-sm-2" style="padding:10px; margin:auto">
      <img src="../assets/title.png" width="100%"/>
      </div>
          <div id="goBack" @click="goBack">GO BACK</div>
  </div>
    <h2>Your Events</h2>
  
  <div id="events">
    <div class="eventTile" v-for="item in dashboardList">
      <h3 @click="goToEvent(item.eventCode)">{{item.eventname}}</h3>
    </div>
    <div class="eventTile">
      <h3 id="createNew" @click="createNew">Create New...</h3>
    </div>
  </div>
  </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
  @import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";

</style>

<script>
  export default {
    name: "Dashboard",
    data() {
      return {
        dashboardList: "",
      }
    },
    methods: {
      goBack: function() {
        this.$router.push('mainpage');
      },
      createNew: function() {
        this.$router.push('mainpage');
      },
      goToEvent: function(eventCode) {
        sessionStorage.setItem("eventCode", eventCode);
        this.$router.push('eventpage');
      }
    },
    beforeCreate: async function() {
      //      var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/getJoinedEvents.php");
      //      var json = await resp.json();
      //      this.event = json;
      //      console.log(json);
      ////      
      var userForm = new FormData();
      userForm.append("userID", sessionStorage.getItem("userID"));
      //      console.log(sessionStorage.getItem("userID"));

      var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/getJoinedEvents.php", {
        method: "POST",
        body: userForm
      })
      var json = await resp.json();
      console.log(json);
      this.dashboardList = json;
    },
  }

</script>
