import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from "@/router/index.js";
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000';


createApp(App)
    .use(router)
    .mount('#app')