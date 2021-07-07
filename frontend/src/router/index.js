import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home'
import Quiz from '../components/Quiz.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/quiz',
    name: 'Quiz',
    component: Quiz,
  },
  {
    path: '/results',
    name: 'Results',
    component: () => import('../components/Results.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
