<template>
  <div v-for="user in users" :key="user.id">
    {{ user.name }}
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    fetch("http://127.0.0.1:8000/api/users")
      .then((response) => response.json())
      .then((data) => {
        this.users = data;
      });
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
