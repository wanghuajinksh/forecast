import VueRouter from 'vue-router';
import Vue from 'vue';
import Wave from './components/Wave';
import Wind from './components/Wind';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/',
            name: 'wave',
            component: Wave
        },
        {
            path: '/wind',
            name: 'wind',
            component: Wind
        },
        {
            path: '*',
            redirect: '/',
        }
    ]
});

export default router;