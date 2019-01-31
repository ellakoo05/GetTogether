<template>
  <div id="eventForm">
    <div id="EventLeftSide">
      <div id="eventCreate">
        <h2>create</h2>
        <div class="eventForm">
          <h3 class="formnames">Basics</h3>
          <input type="text" name="eventname" class="EventInputs" placeholder="Event Name" v-model="eventname"><br/><br/>
          <input type="text" name="eventtype" class="EventInputs" style="width:40%" placeholder="Type">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="eventcategory" class="EventInputs" style="width:40%" placeholder="Category"><br/>
          <br/>
          <input type="text" name="eventorganizer" class="EventInputs" placeholder="Organizer">
          <br/>
          <br/>
          <h3 class="formnames">Location</h3>
          <input type="text" name="eventlocation" class="EventInputs" placeholder="enter address or venue name" v-model="eventlocation">
          <br/><br/>
          <h3 class="formnames">Date and Time</h3>
          <input type="date" name="eventdate" v-model="eventdate" class="EventInputs" placeholder="start date" style="width:40%"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="time" name="eventtime" v-model="eventtime" class="EventInputs" placeholder="start time" style="width:40%"/><br/><br/>
          <input type="date" name="eventenddate" v-model="eventenddate" class="EventInputs" placeholder="end date" style="width:40%"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="time" name="eventend" v-model="eventend" class="EventInputs" placeholder="end time" style="width:40%"/>
          <router-link tag="button" to="/eventpage" @click.native="insertEvent" type="submit" id="partyButton">Let's Party!</router-link>
        </div>
      </div>
    </div>
    <div id="rightSide" class="vl">
      <div id="eventCreate">
        <h2>join</h2>
      <div id="joinBox">
        <h3 style="padding-top:10px; padding-left:15px; color:black;" class="formnames">event code</h3>
        <form class="signupForm" method="get" id="join">
          <input type="text" name="eventCode" class="EventInputs" placeholder="enter event code...">
          <router-link to="/eventpage" tag="button" id="joinButton">join event</router-link>
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
    data() {
      return {
        eventname: "",
        eventdate: "",
        eventlocation: "",
        eventenddate: "",
        eventtime: "",
        eventend: "",
        page: 0
      }
    },
    methods: {
      insertEvent: async function() {
        var eventForm = new FormData();
        eventForm.append("eventname", this.eventname);
        eventForm.append("eventdate", this.eventdate);
        eventForm.append("eventlocation", this.eventlocation);
        eventForm.append("eventenddate", this.eventenddate);
        eventForm.append("eventtime", this.eventtime);
        eventForm.append("eventend", this.eventend);
        await fetch("https://gettogetherbcit.herokuapp.com/mysql/insertEvents.php", {
          method: "POST",
          body: eventForm
        }).then((resp) => {
          return resp.json;
        }).then((json) => {
          if (json) {
            alert("hi")
          }
        })
      }
    }
  }
</script>