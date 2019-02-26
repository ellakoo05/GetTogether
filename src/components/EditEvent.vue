<template>
<div id="eventForm">
    <div class="container">
      <div class="row">
      <div id="eventCreate">
        <h3 id="pageTitle">{{eventTitle}}</h3>
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
              <button id="done" class="btn" @click="UpdateEvent">Done</button>
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
  export default {
    name: "edit",
    data() {
      return {
        eventTitle: "Editing " + this.store.eventname,
        tasks: "",
        eventlocation: "",
        eventname: "",
        eventdate: "",
        eventenddate: "",
        eventtime: "",
        eventend: "",
        userID: this.store.userID,
      }
    },
    methods: {
      UpdateEvent: async function() {
        var eventForm = new FormData();
        eventForm.append("eventname", this.eventname);
        eventForm.append("eventdate", this.eventdate);
        eventForm.append("eventlocation", this.eventlocation);
        eventForm.append("eventenddate", this.eventenddate);
        eventForm.append("eventtime", this.eventtime);
        eventForm.append("eventend", this.eventend);
        eventForm.append("eventCode", sessionStorage.getItem("eventCode"));
        console.log("eventCode", sessionStorage.getItem("eventCode"));

        var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/updateEvents.php", {
          method: "POST",
          body: eventForm
        })

        var json = await resp.json();
      }
    }
  }

</script>
