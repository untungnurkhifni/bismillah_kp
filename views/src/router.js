import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Tentang from "./views/Tentang.vue";
import Kurikulum from "./views/Kurikulum.vue";
import Login from "./views/Login.vue";
import Crud from "./views/Crud.vue";
import NotFound from "./views/404.vue";

Vue.use(Router);

export default new Router({
	mode: "history",
	routes: [
		{
			path: "/",
			name: "home",
			component: Home
		},
		{
			path: "/tentang",
			name: "tentang",
			component: Tentang
		},
		{
			path: "/kurikulum",
			name: "kurikulum",
			component: Kurikulum
		},
		{
			path: "/login",
			name: "login",
			component: Login
		},
		{
			path: "/crud",
			name: "Crud",
			component: Crud
		},
		{
			path: "*",
			component: NotFound
		}
	]
});
