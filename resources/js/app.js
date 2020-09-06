
window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app-component', require('./App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    { path: "/", component: require('./components/HomePage.vue').default },
    { path: "/team", component: require('./components/TeamPage.vue').default },
    { path: "/projects", component: require('./components/ProjectsPage.vue').default },
];

const router = new VueRouter({
    routes: routes,
    mode: "history",
})

const app = new Vue({
    router
}).$mount('#app');
