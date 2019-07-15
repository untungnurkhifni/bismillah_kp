import Vue from 'vue'
import Router from 'vue-router'
import Crud from './views/Crud.vue';
import Post from './views/Post.vue';
import User from './views/User.vue';

Vue.use(Router);

export default new Router ({
    mode: "history",
    routes: [
        {
            path:"/",
            name: "Crud",
            component: Crud
        },
        {
            path: "/post",
            name: "Post",
            component: Post
        },
        {
            path: "/user",
            name: "User",
            component: User
        }
    ]
});