<template>
<div id="Dashboard">
  <div v-for="item in dashboardList">
    <div>{{item.eventname}}</div>
    <div>{{item.eventdate}}</div>
    <div>{{item.eventlocation}}</div>
  </div>
</div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>

<script>
  export default {
    name: "Dashboard",
    data() {
      return {
        dashboardList: "",
      }
    },
    methods: {},
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