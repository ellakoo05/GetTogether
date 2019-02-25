<template>
<div id="addtask">
<div id="event">

              <div id="addingTask">
        <h2>Add Tasks</h2>
        <input type="text" placeholder="task title" v-model="tasks"/>
        <button @click="InsertTask">Add</button>
        <div v-for="item in newTasks">
          <div>{{item.tasks}}</div>
  </div>
  </div></div>
  </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
</style>


<script>
  export default {
    name: "AddTask",
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

        //console.log(json);
        var displayTasks = new FormData();
        displayTasks.append("eventCode", sessionStorage.getItem("eventCode"));
        displayTasks.append("tasks", this.tasks);

        var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/getJoinedTasks.php", {
          method: "POST",
          body: displayTasks
        })

        var json = await resp.json();
        this.newTasks = json;
      },
    },
  }
</script>