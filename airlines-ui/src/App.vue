<template>
  <div class="grid grid-cols-2">
    <div>
      <h1 class="text-2xl font-bold underline">Flights</h1>
      <table v-if="!isLoading && !error">
        <tr>
          <th>#</th>
          <th>Source</th>
          <th>Destination</th>
          <th>Take-off time</th>
          <th></th>
        </tr>
        <tbody>
          <tr v-for="fligth in flights" :key="fligth.id">
            <td>{{ fligth.id }}</td>
            <td>{{ fligth.source }}</td>
            <td>{{ fligth.destination }}</td>
            <td>{{ fligth.date }}</td>
            <td><button @click="handleClick(fligth.id)">Checkout</button></td>
          </tr>
        </tbody>
      </table>
      <div v-if="isLoading">Loading...</div>
    <div v-if="error">Error: {{ error }}</div>
    </div>
    <div v-if="selectedFlight" class="flex flex-col justify-center items-center">
      <SelectedFlight :id="this.selectedFlight" />
    </div>
    
  </div>
</template>

<script>
import { fetchFlights } from "@/services/apiService";
import SelectedFlight from "./SelectedFlight.vue";

export default {
  components: { SelectedFlight },
  data() {
    return {
      flights: [],
      isLoading: false,
      error: null,
      selectedFlight: null,
    };
  },
  async created() {
    this.isLoading = true;

    try {
      this.flights = await fetchFlights();
      this.isLoading = false;
    } catch (error) {
      this.error = error.message;
      this.isLoading = false;
      console.error(error);
    }
  },
  methods: {
    handleClick(id) {
      console.log("clicked", id);
      this.selectedFlight = id;
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  display: flex;

  justify-content: center;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
