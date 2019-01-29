<template>
  <div class="event">
    <Event />
  </div>
</template>

<script>
// @ is an alias to /src
import Event from "@/components/EventDetails.vue";

export default {
  name: 'home',
  components: {
    Event: Event
  }
}
</script>
