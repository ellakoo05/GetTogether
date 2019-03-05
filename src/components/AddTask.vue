<template>
  <div id="addtask">
    <div id="tasks">
      <div id="myDIV" class="header">
        <h3>Add Tasks</h3>
        <input type="text" id="myInput" v-model="tasks" placeholder="New Task...">
        <span @click="InsertTask" class="addBtn">Add</span>
      </div>

      <ul id="myUL"></ul>
    </div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Nunito");
@import "./style.css";
</style>


<script>
export default {
  name: "AddTask",
  data() {
    return {
      tasks: ""
    };
  },
  methods: {
    deleteTask: async function(event) {
      //var div = document.getElementById(event.target.id);
      var parentDiv = event.target.parentElement;
      event.target.style.display = "none";
      parentDiv.style.display = "none";
      var deleteForm = new FormData();
      deleteForm.append("taskID", event.target.parentElement.id);
      var resp = await fetch(
        "https://gettogetherbcit.herokuapp.com/mysql/deleteTasks.php",
        {
          method: "POST",
          body: deleteForm
        }
      );
    },
    editTask: async function(event) {
      var editTask = new FormData();
      editTask.append(
        "tasks",
        event.target.parentElement.querySelector(".updateInput").value
      );
      editTask.append("taskID", event.target.parentElement.id);
      var resp = await fetch(
        "https://gettogetherbcit.herokuapp.com/mysql/updateTasks.php",
        {
          method: "POST",
          body: editTask
        }
      );

      var result = await resp.json();

      if (!result) {
        alert("update failed. try again");
      } else {
        var task = event.target.parentElement;
        var taskText = task.querySelector(".taskText");

        var updateButton = event.target;
        updateButton.onclick = e => {
          this.changeEditInput(e)
        };
        
        updateButton.style.backgroundImage = "url('https://image.flaticon.com/icons/svg/1159/1159633.svg')";

        taskText.innerHTML = event.target.parentElement.querySelector(
          ".updateInput"
        ).value;

        var inputBox = task.querySelector(".updateInput");
        inputBox.style.display = "none";
        inputBox.value = "";
      }
    },
    createTaskElement: function(taskID, inputValue) {
      var i;
      // Create a new list item when clicking on the "Add" button
      var li = document.createElement("div");
      var taskText = document.createElement("span");
      taskText.className = "taskText";
      taskText.innerHTML = inputValue;
      li.id = taskID;
      li.className = "listItems";
      li.appendChild(taskText);
      if (inputValue === "") {
        alert("You have to write something!");
      } else {
        document.getElementById("myUL").appendChild(li);
      }
      document.getElementById("myInput").value = "";

      var updateInput = document.createElement("input");
      updateInput.className = "updateInput";
      updateInput.style.display = "none";
      li.appendChild(updateInput);

      // create 'x' button
      var deleteButton = document.createElement("div");
      deleteButton.className = "deleteButton";
      li.appendChild(deleteButton);

      //create update button
      var updateButton = document.createElement("div");
      updateButton.className = "updateButton";
      li.appendChild(updateButton);

      updateButton.onclick = e => {
        this.changeEditInput(e);
      };

      // grab all 'x' buttons
      var deleteButton = document.getElementsByClassName("deleteButton");

      // add delete function to each 'x' button
      for (i = 0; i < deleteButton.length; i++) {
        deleteButton[i].onclick = e => {
          this.deleteTask(e);
        };
      }
    },
    changeEditInput: async function(event) {
      var task = event.target.parentElement;
      var taskText = task.querySelector(".taskText");

      var updateButton = event.target;
      updateButton.onclick = e => {
        this.editTask(e);
      };
      
      updateButton.style.backgroundImage = "url('https://image.flaticon.com/icons/svg/128/128384.svg')";

      var inputBox = task.querySelector(".updateInput");
      inputBox.style.display = "inline-block";
      inputBox.value = taskText.innerHTML;

      taskText.innerHTML = "";
    },
    InsertTask: async function() {
      var taskForm = new FormData();
      var inputValue = document.getElementById("myInput").value;
      taskForm.append("tasks", this.tasks);
      taskForm.append("eventCode", sessionStorage.getItem("eventCode"));

      if (inputValue === "") {
        alert("You have to write something!");
      } else {
        var resp = await fetch(
          "https://gettogetherbcit.herokuapp.com/mysql/insertTasks.php",
          {
            method: "POST",
            body: taskForm
          }
        );
        var json = await resp.json();
      
        if (json) {
          this.createTaskElement(json, inputValue);
        }
      }
    }
  },
  beforeCreate: async function() {
    var displayTasks = new FormData();
    displayTasks.append("eventCode", sessionStorage.getItem("eventCode"));
    displayTasks.append("tasks", this.tasks);

    var resp = await fetch(
      "https://gettogetherbcit.herokuapp.com/mysql/getJoinedTasks.php",
      {
        method: "POST",
        body: displayTasks
      }
    );
    var json = await resp.json();
    this.newTasks = json;
  
    for (var i = 0; i < json.length; i++) {
      this.createTaskElement(json[i].id, json[i].tasks);
    }
  }
};
</script>
