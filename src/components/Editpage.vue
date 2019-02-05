<template>
   <div id="eventForm">
    <div id="EventLeftSide">
      <div id="eventCreate">
        <h2>Editing "{eventname}"</h2>
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
          <button id="done" class="btn">Done</button>
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