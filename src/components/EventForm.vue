<template>
  <div id="eventForm">
    <div id="EventLeftSide">
      <div id="eventCreate">
        <h2>create</h2>
        <form class="eventForm" method="post" action="http://localhost/selectuser.php">
          <h3 class="formnames">Basics</h3>
          <input type="text" name="eventname" class="EventInputs" placeholder="Event Name" v-model="eventname"><br/><br/>
          <input type="text" name="eventtype" class="EventInputs" style="width:40%" placeholder="Type">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="eventcategory" class="EventInputs" style="width:40%" placeholder="Category"><br/>
          <br/>
          <input type="text" name="eventorganizer" class="EventInputs" placeholder="Organizer">
          <br/>
          <br/>
          <h3 class="formnames">Location</h3>
          <input type="text" name="eventlocation" class="EventInputs" placeholder="enter address or venue name">
          <br/><br/>
          <h3 class="formnames">Date and Time</h3>
          <input type="date" name="eventdate" class="EventInputs" placeholder="start date" style="width:40%"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="time" name="eventtime" class="EventInputs" placeholder="start time" style="width:40%"/><br/><br/>
          <input type="date" name="eventenddate" class="EventInputs" placeholder="end date" style="width:40%"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="time" name="eventend" class="EventInputs" placeholder="end time" style="width:40%"/>
          <input @click="eventCreate" type="submit" value="Let's Party!" id="partyButton">
        </form>
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
        eventname: ""
      }
    },
    methods: {
      eventCreate: function() {
        alert("Your new event:" + this.eventname)
      }
    }
  }
</script>