import axios from 'axios';

const mainURL = axios.create({
  /** localhost */
  baseURL: 'http://localhost:8000/api/v1',
  /** development */
  // baseURL: 'https://templatevue.yogabayuap.com/api/v1',
  /** production */
  // baseURL: 'https://kma.bankarthaya.com/api/v1',
});

export default mainURL;
