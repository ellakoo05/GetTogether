<template>
  <div id="eventForm">
    <div id="EventLeftSide">
      <div id="eventCreate">
        <h2 id="createTitle" >Create</h2>
        <div class="eventForm">
          <h3 class="formnames">Basics</h3>
          <input type="text" name="eventname" class="EventInputs" placeholder="Event Name" v-model="eventname"><br/><br/>
<!--
          <input type="text" name="eventtype" class="EventInputs" style="width:40%" placeholder="Type">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="eventcategory" class="EventInputs" style="width:40%" placeholder="Category"><br/>
          <br/>
-->
          <input type="text" name="eventorganizer" class="EventInputs" placeholder="Organizer">
          <br/>
          <br/>
          <h3 class="formnames">Location</h3>
          <input type="text" name="eventlocation" class="EventInputs" placeholder="Enter address or venue name" v-model="eventlocation">
          <br/><br/>
          <h3 class="formnames">Date and Time</h3>
<!--          <h6>Start Date</h6>-->
          <input type="date" name="eventdate" v-model="eventdate" class="EventInputs" placeholder="start date" style="width:40%"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--          <h6>Start Time</h6>-->
          <input type="time" name="eventtime" v-model="eventtime" class="EventInputs" placeholder="start time" style="width:40%"/><br/><br/>
<!--          <h6>End Date</h6>-->
          <input type="date" name="eventenddate" v-model="eventenddate" class="EventInputs" placeholder="end date" style="width:40%"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--          <h6>End Time</h6>-->
          <input type="time" name="eventend" v-model="eventend" class="EventInputs" placeholder="end time" style="width:40%"/>
          <button @click="insertEvent" id="partyButton">Let's Party!</button>
        </div>
      </div>
    </div>
    <div id="EventRightSide" class="vl">
      <button id="goDashboard" @click="goToDashboard">DASHBOARD</button>
      <div id="eventCreate">
        <h2 id="joinTitle">Join</h2>
      <div id="joinBox">
        <h3 style="padding-top:10px; padding-left:15px; color:black;" class="formnames">Event code</h3>
        <div class="signupForm" id="join">
          <input type="text" name="eventCode" class="EventInputs" placeholder="enter event code...(eg. 876587)" v-model="eventCode">
          <button @click="joinEvent" id="joinButton">Join Event</button>
        </div>
        </div>
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
  data() {
    return {
      eventname: "",
      eventdate: "",
      eventlocation: "",
      eventenddate: "",
      eventtime: "",
      eventend: "",
      page: 0,
      eventCode: "",
      userID: this.store.userID
    };
  },
  methods: {
    goToDashboard: function() {
      this.$router.push("dashboard");
    },

    insertEvent: async function() {
      var generatedEventCode = "";

      //generatedEventCode = randomly generated event code
      for (var i = 0; i < 6; i++) {
        var t = Math.round(Math.random() * 9);
        generatedEventCode += t;
      }

      //store generatedEventCode in sessionStorage
      sessionStorage.setItem("eventCode", generatedEventCode);

      var eventForm = new FormData();
      eventForm.append("eventname", this.eventname);
      eventForm.append("eventdate", this.eventdate);
      eventForm.append("eventlocation", this.eventlocation);
      eventForm.append("eventenddate", this.eventenddate);
      eventForm.append("eventtime", this.eventtime);
      eventForm.append("eventend", this.eventend);
      eventForm.append("eventCode", generatedEventCode);
      eventForm.append("userID", sessionStorage.getItem("userID"));

      var resp = await fetch(
        "https://gettogetherbcit.herokuapp.com/mysql/insertEvents.php",
        {
          method: "POST",
          body: eventForm
        }
      );

      var json = await resp.json();

      if (json) {
        this.eventCode = generatedEventCode;
        this.joinEvent();
        this.$router.push("eventpage");
      } else {
        alert("Create Failed. Try Again");
      }
    },
    joinEvent: async function() {
      var joinForm = new FormData();
      joinForm.append("userID", sessionStorage.getItem("userID"));
      joinForm.append("eventCode", this.eventCode);
      console.log;
      sessionStorage.setItem("eventCode", this.eventCode);

      var resp = await fetch(
        "https://gettogetherbcit.herokuapp.com/mysql/joinEvent.php",
        {
          method: "POST",
          body: joinForm
        }
      );

      var json = await resp.json();
      if (json) {
        this.$router.push("eventpage");
      } else {
        alert("NO!");
      }
    }
  }
};
</script>