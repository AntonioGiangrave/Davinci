import axios from "axios";

export default axios.create({
  baseURL: "http://test.davinci.it:8080/api",
  headers: {
    "Content-type": "application/json"
  }
});
