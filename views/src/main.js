import Vue from "vue";
import "./plugins/vuetify";
import App from "./App.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import VueMeta from "vue-meta";
import router from "./router";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faBook, faGlobe } from "@fortawesome/free-solid-svg-icons";
import {
	faInstagram,
	faTwitter,
	faFacebook
} from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import "vuetify/dist/vuetify.min.css";
import "flickity/dist/flickity.min.css";

library.add(faGlobe, faBook, faInstagram, faTwitter, faFacebook);

Vue.component("font-awesome-icon", FontAwesomeIcon);
Vue.use(VueAxios, axios);
Vue.use(VueMeta);

axios.defaults.baseURL = "http://localhost/kp_amikom/index.php/api";
Vue.config.productionTip = false;

new Vue({
	router,
	render: h => h(App)
}).$mount("#app");
