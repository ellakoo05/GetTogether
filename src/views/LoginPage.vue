<template>
  <div id="login">
    <Login />
  </div>
</template>

<script>
  import Login from "@/components/LoginForm.vue";
  
  export default {
    name: "loginpage",
    components: {
      Login: Login
    }}
</script>