import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import LoginPage from './views/LoginPage.vue'
import UserSignUp from './views/SignupPage.vue'
import Main from './views/MainPage.vue'
import Event from './views/Event.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path:'/loginpage',
      name:'loginpage',
      component: LoginPage
    },
    {
      path:'/mainpage',
      name:'mainpage',
      component: Main
    },
    {
      path:'/signuppage',
      name:'usersignup',
      component: UserSignUp
    },
    {
      path:'/eventpage',
      name:'eventpage',
      component: Event
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    }
  ]
})
