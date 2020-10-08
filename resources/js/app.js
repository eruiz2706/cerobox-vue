require('./bootstrap');
window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.use(VueSweetalert2);

import routes from './routes';
const router  =new VueRouter({
  routes
});

Vue.component('spinner',require('vue-simple-spinner'));


import App from './App.vue';

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
