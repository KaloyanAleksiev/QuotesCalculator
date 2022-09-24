import NotFound from './components/NotFound'
import Quote from './components/Quote'

export default [
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    },
    {
        path: '/',
        component: Quote,
    }
]
