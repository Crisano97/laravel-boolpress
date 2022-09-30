import VueRouter from 'vue-router';

import AboutPage from './pages/AboutPage';
import ContactsPage from './pages/ContactsPage';
import HomePage from './pages/HomePage';
import SinglePost from './pages/SinglePost';
import CategoriesIndexPage from './pages/CategoriesIndexPage';
import CategoryPostsList from './pages/CategoryPostsList';
import PageNotFound from './pages/errors/PageNotFound';


const router = new VueRouter({
    mode: 'history',
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
        {
            path: '/posts/:id',
            name: 'singlePost',
            component: SinglePost
        },
        {
            path: '/categories',
            name: 'categoriesIndexPage',
            component: CategoriesIndexPage
        },
        {
            path: '/categories/:id',
            name: 'categoryPostsList',
            component: CategoryPostsList
        },
        {
            path: '*',
            name: 'pageNotFound',
            component: PageNotFound
        },
    ]
});

export default router