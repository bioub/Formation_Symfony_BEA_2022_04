import { createApp } from 'vue'
import App from './App.vue'
import {} from 'vue-router';
import Vuex from 'vuex';

//import routes
import contactRoutes from './router/contact';

// Add routes to VueRouter
const router = new VueRouter({
  // ...
  routes: [
      ...contactRoutes,
  ]
});

// Add the modules in the store
import contact from './store/modules/contact/';

export const store = new Vuex.Store({
  // ...
  modules: {
    contact
  }
});


const app = createApp(App, {
  store,
  router
})


app.mount('#app')
