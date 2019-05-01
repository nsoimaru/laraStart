
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;
// const Swal = require('sweetalert2')

// Vue progress bar
import VueProgressBar from 'vue-progressbar'

const options = {
  color: '#bffaf3',
  failedColor: '#874b4b',
  thickness: '3px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}

Vue.use(VueProgressBar, options)

// Vue progress bar end

// vue router code start
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/home', component: require('./components/Home.vue').default },
  { path: '/developer', component: require('./components/Developer.vue').default },
  { path: '/users', component: require('./components/Users.vue').default },
  { path: '/profile', component: require('./components/Profile.vue').default }
]

const router = new VueRouter({
  mode: 'history',
  routes // short for `routes: routes
})
// vue router code end

// vue global filter
Vue.filter('upTxt', function(text){
  return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function(created){
  return moment(created).format('MMMM Do YYYY');
});


// Global lisener
window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 Vue.component(
     'passport-clients',
     require('./components/passport/Clients.vue').default
 );

 Vue.component(
     'passport-authorized-clients',
     require('./components/passport/AuthorizedClients.vue').default
 );

 Vue.component(
     'passport-personal-access-tokens',
     require('./components/passport/PersonalAccessTokens.vue').default
 );



const app = new Vue({
    el: '#app',
    router
});
