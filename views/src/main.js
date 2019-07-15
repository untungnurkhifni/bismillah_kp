import Vue from 'vue'
import './plugins/vuetify'
import App from './App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from './router';


Vue.use(VueAxios,axios)

axios.defaults.baseURL = 'http://localhost/coba_vue_ci/index.php/api' 
//web servis
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
