import VueRouter from 'vue-router';

import AboutPage from './pages/AboutPage';
import ContactsPage from './pages/ContactsPage';
import HomePage from './pages/HomePage';

const router = new VueRouter({
    mode: history,
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsPage
        },
    ]
});

export default router