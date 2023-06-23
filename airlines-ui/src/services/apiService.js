import axios from 'axios';


const baseUrl = "http://127.0.0.1:8000/api"

export const fetchFlights = async () => {
  try {
    const response = await axios.get(`${baseUrl}/flights`);
    return response.data;
  } catch (error) {
    throw new Error('Error fetching flights.');
  }
};