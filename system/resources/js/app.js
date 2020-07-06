/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import Vuetify from '../../node_modules/vuetify/dist/vuetify';

// import Vue from 'vue'
// import App from './App.vue'
import VueRouter from '../../node_modules/vue-router';
// import store from './store'
import vuetify from '../../src/plugins/vuetify'
import axios from '../../node_modules/axios'
// import Vuelidate from '../../node_modules/vue'
import VueAlertify from '../../node_modules/vue-alertify';

Vue.use(Vuetify);
Vue.use(VueRouter )

// export default new Vuetify({
//   theme: {
//     themes: {
//       light: {
//         primary: '#243cc6',
//         secondary: '#424242',
//         accent: '#82B1FF',
//         error: '#FF5252',
//         info: '#2196F3',
//         success: '#4CAF50',
//         warning: '#FFC107'
//       },
//     },
//   },
//   icons: {
//     iconfont: 'mdi',
//   },
// });


require('./bootstrap');

window.Vue = require('vue');




Vue.use(VueAlertify, {
  notifier: {
    // auto-dismiss wait time (in seconds)
    delay: 5,
    // default position
    position: 'top-right',
    // adds a close button to notifier messages
    closeButton: false,
  }
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 * 
 */

import Home from './components/Home.vue';
import Compliance from './components/Compliance.vue';
import Regularory_Engine from './components/Regularory_Engine.vue';
import Assessment from './components/Assessment.vue';


const router = new VueRouter({
    mode: 'history',
    routes: [
      {
        path: '/',
        name: 'Home',
        component: Home
      },
      {
        path: '/compliance',
        name: 'compliance',
        component: Compliance
      },
      {
        path: '/regularoty_engine',
        name: 'regularoty_engine',
        component: Regularory_Engine
      },
      {
        path: '/assessment',
        name: 'assessment',
        component: Assessment
      },
    ],
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('app-component', require('./components/App.vue').default);
Vue.component('app-component', require('../../src/App.vue').default);

// import App from './components/App.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it  to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    // store,
    vuetify,
    // components: {
    //     App
    // }
});


