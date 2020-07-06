import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Compliance from '../views/Compliance.vue'
import Regularory_Engine from '../views/Regularory_Engine.vue'
import Assessment from '../views/Assessment.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/compliance',
    name: 'compliance',
    component: Compliance
  },
  {
    path: '/regularoty_engine',
    name: 'regularoty_engine',
    component: Regularory_Engine
  },
  {
    path: '/assessment',
    name: 'assessment',
    component: Assessment
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
