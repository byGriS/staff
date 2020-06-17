require('./bootstrap');
window.Vue = require('vue');
import VueResource from 'vue-resource'
Vue.use(VueResource);
Vue.http.options.emulateJSON = true;
Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

import store from './stores/store.js'

Vue.component('login-form', require('./components/LoginForm.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('list-staff', require('./components/ListStaff.vue').default);
Vue.component('employee-form', require('./components/EmployeeForm.vue').default);
Vue.component('employee-view', require('./components/EmployeeView.vue').default);

const app = new Vue({
  el: '#app',
  store: store
});
