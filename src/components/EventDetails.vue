<template>
<div id="event">
    <div id="eventLeft">
      <div id="eventInfo" v-for="item in event">
        <div >{{item.eventname}}</div><br/>
        <div >{{item.eventdate}}</div><br/>
        <div >{{item.eventtime}}</div><br/>
        <div >{{item.eventlocation}}</div><br/>
  </div>
      <div id="deleteEvent" @click="deleteEvent">DELETE</div>
  </div>
    <div id="eventRight">
<!--
      <div class="rows" style="background-color:gold;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:orange;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:darkorange;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:red;"><div class="rowsText"></div></div>
      <div class="rows" style="background-color:darkred;"><div class="rowsText"></div></div>
-->
              <div v-for="item in newTasks">
          <div>{{item.tasks}}</div>
  </div>
  </div>
<!--  if admin, show admin component here-->
    <AddTask v-if="isAdmin"/>
    </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>
<script>
  import AddTask from "@/components/AddTask.vue";
  export default {
    name: "eventDetails",
    components: {
      AddTask: AddTask
    },
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
        newTasks: "",
        isAdmin: false,
        text: ''
      }
    },
    methods: {
      deleteEvent: async function() {
        this.$swal({
          title: 'Are you sure?',
          text: 'If you click yes, this event will be deleted forever.',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, Delete this event',
          cancelButtonText: 'No, keep it',
          confirmButtonColor: "lightcoral",
          cancelButtonColor: "lightblue",
          showCloseButton: true,
          showLoaderOnConfirm: true
        }).then((result) => {
          if (result.value) {
            this.$swal('Deleted', 'You successfully deleted this event', 'success')
            this.$router.push('dashboard')
            var deleteEvent = new FormData();
            deleteEvent.append("eventCode", sessionStorage.getItem("eventCode"));
            var resp = fetch("https://gettogetherbcit.herokuapp.com/mysql/deleteEvents.php", {
              method: "POST",
              body: deleteEvent
            })
            var json = resp.json();
          } else {
            this.$swal('Cancelled', 'Your event still exists', 'info')
          }
        })
      },
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

        //console.log(json);
      }
    },
    beforeCreate: async function() {
      var eventForm = new FormData();
      eventForm.append("eventCode", sessionStorage.getItem("eventCode"));

      var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/selectEvent.php", {
        method: "POST",
        body: eventForm
      })

      var json = await resp.json();
      this.event = json;
      debugger;
      if (json) {
        this.store.eventID = json[0].id;
        this.store.eventname = json[0].eventname;
        this.store.eventlocation = json[0].eventlocation;

        var temp = sessionStorage.getItem("userID");
        var temp2 = json[0].admin;
        debugger;
        if (sessionStorage.getItem("userID") === json[0].admin) {
          this.isAdmin = true;
        } else {
          this.isAdmin = false;
        }
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