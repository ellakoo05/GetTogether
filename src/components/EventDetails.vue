<template>
<div id="event">
    <div id="eventLeft">
      <div id="eventInfo" v-for="item in event">
        <div >{{item.eventname}}</div><br/>
        <div >{{item.eventdate}}</div><br/>
        <div >{{item.eventtime}}</div><br/>
        <div >{{item.eventlocation}}</div><br/>
  </div>
  </div>
    <div id="eventRight">
      <div id="addingTask">
        <h2>Add Tasks</h2>
        <input type="text" placeholder="task title" v-model="tasks"/>
        <button @click="InsertTask">Add</button>
        <div v-for="item in newTasks">
          <div>{{item.tasks}}</div>
  </div>
</div>


<!--
      <div class="rows" style="background-color:gold;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:orange;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:darkorange;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:red;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:darkred;"><div class="rowsText"></div></div>
-->
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
    components: {},
    data() {
      return {
        event: "",
        eventname: "",
        eventdate: "",
        eventtime: "",
        eventlocation: "",
        page: 0,
        display: false,
        eventCode: "",
        tasks: "",
        newTasks: ""
      }
    },
    methods: {
      InsertTask: async function() {
        var taskForm = new FormData();
        taskForm.append("tasks", this.tasks);
        taskForm.append("eventCode", sessionStorage.getItem("eventCode"));
        console.log(sessionStorage.getItem("eventCode"));

        var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/insertTasks.php", {
          method: "POST",
          body: taskForm
        })
        var json = await resp.json();

        console.log(json);
      }
    },
    beforeCreate: async function() {
      var eventForm = new FormData();
      eventForm.append("eventCode", sessionStorage.getItem("eventCode"));
      eventForm.append("eventname", this.eventname);
      eventForm.append("eventdate", this.eventdate);
      eventForm.append("eventlocation", this.eventlocation);

      //      console.log(sessionStorage.getItem("eventCode"));

      var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/selectEvent.php", {
        method: "POST",
        body: eventForm
      })

      var json = await resp.json();
      this.event = json;
      //    console.log(json);
      if (json.status) {
        this.store.eventID = json.id;
        this.store.eventname = json.eventname;
        this.store.eventlocation = json.eventlocation;

        //        console.log(this.store.eventID);
      }

      var displayTasks = new FormData();
      displayTasks.append("eventCode", sessionStorage.getItem("eventCode"));
      displayTasks.append("tasks", this.tasks);

      var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/getJoinedTasks.php", {
        method: "POST",
        body: displayTasks
      })

      var json = await resp.json();
      this.newTasks = json;
    }
  }
</script>