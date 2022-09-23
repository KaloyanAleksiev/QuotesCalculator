require('./bootstrap');

import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes'
import App from './App.vue'

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

const app = createApp(App)

app.use(router)

app.mount('#app')
