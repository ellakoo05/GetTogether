<template>
  <div class="home">
    <GetStarted />
  </div>
</template>

<script>
// @ is an alias to /src
import GetStarted from "@/components/GetStarted.vue";

export default {
  name: 'home',
  components: {
    GetStarted: GetStarted
  }
}
</script>
