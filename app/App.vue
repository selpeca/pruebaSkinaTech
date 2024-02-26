<template>
    <div class='container'>
      <a-typography-title>Gestión de inventario App</a-typography-title>
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  import Login from './components/Auth/Login.vue';
  
  export default {
    components: {
        Login
    }
  }
  </script>
  
  <style scoped>
  .container {
    padding: 2%;
  }
  </style>