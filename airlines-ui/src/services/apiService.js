import axios from "axios";

const baseUrl = "http://127.0.0.1:8000/api";

export const fetchFlights = async () => {
  try {
    const response = await axios.get(`${baseUrl}/flights`);
    return response.data;
  } catch (error) {
    throw new Error("Error fetching flights.");
  }
};
export const fetchFlight = async (id) => {
  try {
    const response = await axios.get(`${baseUrl}/flights/${id}`);
    return response.data;
  } catch (error) {
    throw new Error("Error fetching flight.", id);
  }
};
export const storeTicket = async (body) => {
  try {
    const response = await axios.post(`${baseUrl}/tickets`, body);
    return response.data;
  } catch (error) {
    throw new Error("Error storing ticket.", body);
  }
};
