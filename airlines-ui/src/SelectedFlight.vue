<template>
  Your selected flight: {{ id }}
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
        <td><button>Buy</button></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: {
    id: Number,
  },
  data() {
    return {
      tickets: [
        { type: "Econmy", available: 10 },
        { type: "Business", available: 9 },
        { type: "First-Class", available: 8 },
      ],
    };
  },
};
</script>

<style lang="scss" scoped></style>
