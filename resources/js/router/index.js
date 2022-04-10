import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import Dashboard from '../pages/Dashboard.vue'

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
			path:'',name:'home',component:Home
		},
		{
			path:'/login',name:'login',component:Login, meta : {guest: true}
		},
		{
			path:'/register',name:'register',component:Register, meta : {guest: true}
		},
		{
			path:'/dashboard',name:'dashboard',component:Dashboard, meta : {requireAuth: true}
		},

    ]
});
export default router;