<template>
  <div>
    <div id="EventLeftSide">
      <div id="eventCreate">
        <h2>create</h2>
        <form class="eventForm" method="get" id="eventRegistration">
          <h3>Basics</h3>
          <input type="text" name="eventTitle" class="EventInputs" placeholder="event title"><br/><br/>
          <input type="text" name="email" class="EventInputs" style="width:40%" placeholder="event title">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="password" class="EventInputs" style="width:40%" placeholder="event title"><br/>
          <br/>
          <input type="text" name="confirmpw" class="EventInputs" placeholder="event title">
          <br/>
          <br/>
          <h3>Location</h3>
          <input type="text" name="location" class="EventInputs" placeholder="enter address or venue name">
          <br/><br/>
          <h3>Date and Time</h3>
          <input type="text" name="startDate" class="EventInputs" placeholder="start date" style="width:40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="startTime" class="EventInputs" placeholder="start time" style="width:40%"><br/><br/>
          <input type="text" name="endDate" class="EventInputs" placeholder="end date" style="width:40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="endTime" class="EventInputs" placeholder="end time" style="width:40%">
          <button type="submit" form="eventRegistration" value="Submit" id="partyButton">let's party!</button>
        </form>
      </div>
    </div>
    <div id="rightSide" class="vl">
      <div id="eventCreate">
        <h2>join</h2>
      <div id="joinBox">
        <h3 style="padding-top:10px">event code</h3>
        <form class="signupForm" method="get" id="join">
          <input type="text" name="eventCode" class="EventInputs" placeholder="enter event code...">
          <button type="submit" form="join" value="Submit" id="joinButton">join event</button>
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