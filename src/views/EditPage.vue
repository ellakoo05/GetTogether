<template>
  <div class="edit">
    <Edit />
  </div>
</template>

<script>
  // @ is an alias to /src
  import Edit from '@/components/EditEvent.vue';

  export default {
    name: 'editpage',
    components: {
      Edit: Edit
    }
  }
</script>
