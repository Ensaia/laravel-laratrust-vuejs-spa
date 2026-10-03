import { createRouter, createWebHistory } from 'vue-router';
import routes from '@/router/routes';

import { useAuthStore } from '@/stores/auth';

const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes,
});
/*
router.beforeEach(async (to, from) => {
  const authStore = useAuthStore();

  const exceptionalRoutes = ['login', 'register', 'forgot-password'];
  const isGoingExceptionalRoutes = exceptionalRoutes.includes(to.name);

  const requiresAuth = to.matched.some((record) => record.meta.auth);
  const requiresGuest = to.matched.some((record) => record.meta.guest);
  
  if(requiresGuest && !authStore.isLoggedIn) {
    if(isGoingExceptionalRoutes){
      // next();
      return;
    }else{
      // next({name : 'login'});
      return ('/login');
    }
  }

  if (!authStore.isLoggedIn) {
    await authStore.getCurrentUser();
  }

  if (requiresAuth && !authStore.isLoggedIn) {
    authStore.clearBrowserData();
    // next({name : 'login'});
    return { path: '/login' }
  } else if (requiresGuest && authStore.isLoggedIn) {
    // next({name : 'dashboard'});
    return { name: 'dashboard' }
    return { path: '/dashboard' }
  } else {
    // next();
    return
  }

})
*/
export default router;
