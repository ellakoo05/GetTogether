<template>
  <div id="eventForm">
    <div id="EventLeftSide">
      <div class="container">
        <h2>create event</h2>
        <div class="row eventCol">
          <div class="col-md-8">
            <label for="basic">Basics</label>
            <input
              type="text"
              name="eventname"
              class="EventInputs"
              placeholder="Event Name"
              v-model="eventname"
            >
            <br/><br/>
            </div>
            <div class="col-md-8">
            <input type="text" name="eventorganizer" class="EventInputs" placeholder="Organizer">
                        <br/><br/>
            </div>
            <div class="col-md-8">
            <label for="location">Location</label>
            <input
              type="text"
              name="eventlocation"
              class="EventInputs"
              placeholder="enter address or venue name"
              v-model="eventlocation"
            >
                        <br/><br/>
            </div>
            
            <div class="col-md-8">
            <label for="datetime">Date and Time</label>

            <div class="col-md-5">
            <input type="date" name="eventdate" v-model="eventdate" class="EventInputs" required>
            </div>

            <br/>

            <div class="col-md-5">
            <input
              type="time"
              name="eventtime"
              v-model="eventtime"
              class="EventInputs"
              placeholder="start time"
              required
            ></div>
            </div>
          <button @click="insertEvent" class="partyButton">Let's Party!</button>
        </div>
      </div>
    </div>
    <div id="EventRightSide" class="vl">
      <button id="goDashboard" @click="goToDashboard">DASHBOARD</button>
      <div class="eventCreate">
        <h2>join event</h2>
        <div id="joinBox">
          <h3 style="padding-top:10px; padding-left:15px; color:black;" class="formnames">event code</h3>
          <div class="signupForm" id="join">
            <input
              type="text"
              name="eventCode"
              class="EventInputs"
              placeholder="enter event code..."
              v-model="eventCode"
            >
            <button @click="joinEvent" id="joinButton">join event</button>
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