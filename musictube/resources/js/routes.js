import VueRouter from 'vue-router';
import mostListened from './components/statistics/mostListened';
import mostLiked from './components/statistics/mostLiked';
import mostDisliked from './components/statistics/mostDisliked';
import mostRecent from './components/statistics/mostRecent';
let routes = [
    {
        path: '/',
        component: mostListened,
        name: ''
    },
    {
        path: '/mostListened',
        component: mostListened,
        name: ''
    },
    {
        path: '/mostDisliked',
        component: mostDisliked,
        name: ''
    },
    {
        path: '/mostLiked',
        component: mostLiked,
        name: ''
    },
    {
        path: '/mostRecent',
        component: mostRecent,
        name: ''
    }

];

export default new VueRouter({
   routes
});