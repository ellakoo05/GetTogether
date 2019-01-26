<template>
  <div id="signup">
    <SignUp />
  </div>
</template>

<script>
  import SignUp from "@/components/UserSignup.vue";
  
  export default {
    name: "signuppage",
    components: {
      SignUp: SignUp
    }}
</script>