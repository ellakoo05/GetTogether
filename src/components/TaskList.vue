<template>
  <div id="tasklist">
    <div id="eventRight">
      <div class="displayItems" v-for="item in newTasks">
        <div class="listItems">
            {{item.tasks}}
            <div class="taskSignup">SELECT</div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Nunito");
@import "./style.css";
</style>
<script>
export default {
  name: "eventDetails",
  data() {
    return {
      newTasks: "",
    };
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

    // var bgImages = new Array("eventRandom1.jpeg", "eventRandom2.jpeg", "eventRandom3.jpeg");
    // var listItems = document.getElementsByClassName("listItems");

    // for (var i = 0; i < listItems.length; i++) {
    //     var random = Math.floor(Math.random() * bgImages.length);
    //     listItems[i].src = bgImages[random];
    // }
  }
};
</script>
