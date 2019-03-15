<template>
  <div id="Dashboard">
    <div id="banner">
      <div class="col-sm-2" style="padding:10px; margin:auto">
        <img src="../assets/title.png" width="100%">
      </div>
      <button id="goBack" @click="goBack">MAIN PAGE</button>
    </div>

    <h1 id="yourEvents">Your Events</h1>

    <div class="container">
      <div class="row">
        <div
          @click="goToEvent(item.eventCode)"
          class="eventImage col-lg-2 eventInfoTitle"
          v-for="item in dashboardList"
        >
          {{item.eventname}}
          <div @click="goToEvent(item.eventCode)" class="eventDetail">
            {{item.eventname}}
            <br>
            {{item.eventlocation}}
            <br>
            {{item.eventdate}}
            <br>
            {{item.eventtime}}
            <br>
            <button @click="goToEvent(item.eventCode)" class="eventSelect-btn">Go to Event</button>
          </div>
        </div>
      </div>
      <button @click="createNew" class="createNew-btn">Create New</button>
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
