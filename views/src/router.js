import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Kurikulum from "./views/Kurikulum.vue";
import Login from "./views/Login.vue";
import Crud from "./views/Crud.vue";
import Post from "./views/Post.vue";
import User from "./views/User.vue";

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
		}
	]
});
