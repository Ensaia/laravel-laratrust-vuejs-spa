import { createApp } from 'vue';
import { createPinia } from 'pinia';



// Plus Bootstrap and dependency CSS
// import './style.css';
// import * as bootstrap from 'bootstrap/dist/js/bootstrap.bundle';

import App from './App.vue';
import router from './router';
import registerLayout from '@/helpers/registerLayout';
import fontAwesomeIcon from "@/utilities/fontawesome";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
const pinia = createPinia();
const app = createApp(App);
app.use(router);
// app.provide('bootstrap', bootstrap);
app.use(pinia);
app.use(VueSweetalert2);
registerLayout(app);
app.component("font-awesome-icon", fontAwesomeIcon)
app.mount('#app');
