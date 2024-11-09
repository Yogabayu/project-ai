import axios from 'axios';

const mainURL = axios.create({
  /** localhost */
  baseURL: 'http://localhost:8000/api/v1',
  /** development */
  // baseURL: 'https://ai.yogabayuap.com/api/v1',
  /** production */
});

export default mainURL;
