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
        <input id="type" type="text" placeholder="   Type your message here...">
        <img id="send" src="src/assets/forward.png" alt="send">
      </div>
    </div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Nunito");
@import "./style.css";
@import "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css";
</style>

<script>
export default {
  name: "chat",
  methods: {}
};
</script>