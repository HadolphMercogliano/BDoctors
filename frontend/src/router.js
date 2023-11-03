import AppHome from './components/pages/AppHome.vue';

import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: AppHome
        }
        // {
        //     path: '',
        //     name: '',
        //     component: 
        // },
        // { 
            // path: '/:pathMatch(.*)*', 
            // name: 'not-found',
            // component: PageNotFound
        // }
    ]
});

export { router };