<template>
<div id="event">
    <div id="eventLeft">
      <div id="eventInfo" v-for="item in event">
        <div >{{item.eventname}}</div><br/>
        <div >{{item.eventdate}}</div><br/>
        <div >{{item.eventtime}}</div><br/>
        <div >{{item.eventlocation}}</div><br/>
  </div>
      <router-link to="/editpage" tag="button">Edit Event</router-link>
  </div>
    <div id="eventRight">
      <div class="rows" style="background-color:gold;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:orange;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:darkorange;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:red;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:darkred;"><div class="rowsText"></div></div>
  </div>
    </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>

<script>
  export default {
    name: "eventDetails",
    data() {
      return {
        event: "",
        eventname: "",
        eventdate: "",
        eventtime: "",
        eventlocation: "",
      }
    },
    methods: {},
    beforeCreate: async function() {
      var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/selectEvent.php");
      var json = await resp.json();
      this.event = json;
      console.log(json);
    },
  }
</script>