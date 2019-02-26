<template>
<div id="addtask">
  <div id="tasks">
    <div id="myDIV" class="header">
      <h3>Add Tasks</h3>
      <input type="text" id="myInput" v-model="tasks" placeholder="New Task...">
      <span @click="InsertTask" class="addBtn">Add</span>
    </div>

    <ul id="myUL">
    </ul>

    <button id="save" @click="SaveTasks">Save</button>
  </div>

  </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';

</style>


<script>
  export default {
    name: "AddTask",
    data() {
      return {
        tasks: "",
        taskID: this.store.taskID,
      }
    },
    methods: {
      SaveTasks: function() {
        this.$router.go();
      },
      deleteTask: async function(id) {
          var div = this.parentElement;
          div.style.display = "none";
          var deleteForm = new FormData();
          deleteForm.append("taskID", id);
          var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/deleteTasks.php", {
            method: "POST",
            body: deleteForm
          })

          var div = this.parentElement;
          div.style.display = "none";
        },
      InsertTask: async function() {
        var taskForm = new FormData();
        taskForm.append("tasks", this.tasks);
        taskForm.append("eventCode", sessionStorage.getItem("eventCode"))
        var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/insertTasks.php", {
          method: "POST",
          body: taskForm
        })
        var json = await resp.json();
        console.log(json);

        if (json) {
          // Store
          sessionStorage.setItem("taskID", json);
        }

        var i;
      
        // Create a new list item when clicking on the "Add" button
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        if (inputValue === '') {
          alert("You have to write something!");
        } else {
          document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.id = sessionStorage.getItem("taskID");
        span.appendChild(txt);
        li.appendChild(span);
        
        
        var close = document.getElementsByClassName("close");
        debugger;
        // Click on a close button to hide the current list item
        for (i = 0; i < close.length; i++) {
          close[i].onclick = 
            async function() {
            var div = this.parentElement;
          div.style.display = "none";
          var deleteForm = new FormData();
          debugger;
          deleteForm.append("taskID", close[i].id);
          var resp = await fetch("https://gettogetherbcit.herokuapp.com/mysql/deleteTasks.php", {
            method: "POST",
            body: deleteForm
          })

          var div = this.parentElement;
          div.style.display = "none";
            }
//            deleteTask(close[i].id)};   
        }
      }
    },
    beforeCreate: function() {
      var myNodelist = document.getElementsByTagName("LI");
      var i;
      for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
      }
    }
  }
</script>
