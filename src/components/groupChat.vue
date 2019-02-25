<template>
<div id="chat">
 <div id="tasks">
 <div id="myDIV" class="header">
  <h2>Tasks</h2>
  <input type="text" id="myInput" placeholder="New Task...">
  <span @click="newElement" class="addBtn">Add</span>
</div>

<ul id="myUL">
  <li>Costco chips</li>
  <li>Edamame</li>
  <li>Guac</li>
  <li>salsa</li>
  <li>Tupperware</li>
  <li>Forks</li>
</ul>
  
  <button id="save">Save</button>
</div>



<div id="msgs">
<div id="topbar">
<h1>Appetizers</h1>
</div>


<div id="TextInput">
<input id="type" type="text" placeholder="   Type your message here..."> <img id="send" src="src/assets/forward.png" alt="send">
</div>

</div>
  </div>
</template>

<style>
  @import url("https://fonts.googleapis.com/css?family=Nunito");
  @import './style.css';
  @import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";
</style>

<script>
  export default {
    name: "chat",
    methods: {
      Tasks: async function() {
        var myNodelist = document.getElementsByTagName("LI");
        var i;
        for (i = 0; i < myNodelist.length; i++) {
          var span = document.createElement("SPAN");
          var txt = document.createTextNode("\u00D7");
          span.className = "close";
          span.appendChild(txt);
          myNodelist[i].appendChild(span);
        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
          close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
          }
        }
      },
      // Create a new list item when clicking on the "Add" button
      newElement: function() {
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
        span.appendChild(txt);
        li.appendChild(span);

        for (var i = 0; i < close.length; i++) {
          close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
          }
        }
      }
    }
  }
</script>