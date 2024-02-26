import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Auth/Login';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'books',
            path: '/',
            component: Login,
        },
    ],
});

export default router;