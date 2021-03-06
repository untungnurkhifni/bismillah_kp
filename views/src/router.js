import Vue from "vue";
import Router from "vue-router";
// main views
import Home from "./views/Pages/Home.vue";
import Tentang from "./views/Pages/Tentang.vue";
import Kurikulum from "./views/Pages/Kurikulum.vue";
// users views
import Dashboard from "./views/Users/Dashboard.vue";
// children users views
import Index from "./views/Users/pages/Index.vue";
import NewPost from "./views/Users/pages/NewPost.vue";
import ListPost from "./views/Users/pages/ListPost.vue";
import ListDosen from "./views/Users/pages/ListDosen.vue";
//import ListSurat from "./views/Users/pages/ListSurat";

// additions
import Login from "./views/Login.vue";
import NotFound from "./views/404.vue";

Vue.use(Router);

const router = new Router({
	base: process.env.BASE_URL,
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
			path: "/dashboard",
			name: "dashboard",
			component: Dashboard,
			meta: { requiresAuth: true },
			children: [
				{
					path: "",
					redirect: "home"
				},
				{
					path: "home",
					name: "index",
					component: Index
				},
				{
					path: "new_posts",
					name: "newpost",
					component: NewPost
				},
				{
					path: "list_posts",
					name: "listpost",
					component: ListPost
				},
				{
					path: "list_users",
					name: "listuser",
					component: ListDosen
				}
				// {
				// 	path: "list_surat",
				// 	name: "listsurat",
				// 	component: ListSurat
				// }
			]
		},
		{
			path: "*",
			component: NotFound
		}
	]
});

router.beforeEach((to, from, next) => {
	const user = JSON.parse(localStorage.getItem("user"));
	if (to.matched.some(record => record.meta.requiresAuth)) {
		if (user) {
			next();
		} else {
			next({ name: "login", redirect: "login" });
		}
	} else {
		// if (to.fullPath == "/login") {
		// 	next({ name: "index", redirect: "index" });
		// } else {
		next();
		// }
	}
});

export default router;
