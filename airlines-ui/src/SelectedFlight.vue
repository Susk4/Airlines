<template>
  <div>
    Your selected flight: {{ id }} Source: {{ flight.source }} destination:
    {{ flight.destination }} date: {{ flight.date }}
  </div>
  <table>
    <tr>
      <th>Type</th>
      <th>Available</th>
      <th></th>
    </tr>
    <tbody>
      <tr v-for="ticket in tickets" :key="ticket.type">
        <td>{{ ticket.type }}</td>
        <td>{{ ticket.available }}</td>
        <td>
          <button
            @click="handleBuyTicket(ticket.type)"
            class="py-1 px-5 rounded"
            :class="{
              'bg-green-300': ticket.available > 0,
              'hover:bg-green-400': ticket.available > 0,
              'bg-red-400': ticket.available <= 0,
            }"
            :disabled="ticket.available <= 0"
          >
            Buy ticket
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import { fetchFlight } from "@/services/apiService";
import { storeTicket } from "@/services/apiService";
export default {
  props: {
    id: Number,
  },
  watch: {
    id: function () {
      this.fetchFlightData();
    },
  },
  data() {
    return {
      tickets: [],
      flight: {},
      isLoading: false,
      error: null,
    };
  },
  created() {
    this.fetchFlightData();
  },
  methods: {
    async fetchFlightData() {
      this.isLoading = true;

      try {
        const data = await fetchFlight(this.id);

        this.flight = data.data;

        this.tickets = [
          { type: "Economy", available: this.flight.economy },
          { type: "Business", available: this.flight.business },
          { type: "First-Class", available: this.flight.first_class },
        ];
        this.flight = {
          source: this.flight.flight.source,
          destination: this.flight.flight.destination,
          date: this.flight.flight.date,
        };
        this.isLoading = false;
      } catch (error) {
        this.error = error.message;
        this.isLoading = false;
        console.error(error);
      }
    },
    async handleBuyTicket(type) {
      this.isLoading = true;

      try {
        const res = await storeTicket({
          user: "addr",
          flight_id: this.id,
          type: type.toLowerCase(),
        });
        console.log(res)
        this.isLoading = false;
      } catch (error) {
        this.error = error.message;
        this.isLoading = false;
        console.error(error);
      }
    },
  },
};
</script>

<style lang="scss" scoped></style>
