import NotFound from './components/NotFound'
import Home from './components/Home'

export default [
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    },
    {
        path: '/',
        component: Home,
    }
]
