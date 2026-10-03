const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/home/Index'),
    meta: { layout: 'home'},
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('@/views/dashboard/home/Index'),
    meta: { layout: 'dashboard', auth: true },
  },
    /*
    * Users routes
     */
  {
    path:'/dashboard/users',
    name:'users',
    component: () => import('@/views/dashboard/user/Index'),
    meta:{ layout : 'dashboard' , auth: true },
  },
  {
    path:'/dashboard/user/:id',
    name:'userEdit',
    component: () => import('@/views/dashboard/user/Edit'),
    props:true,
    meta:{layout : 'dashboard' , auth : true},

  },
  /*
   * Post routes
   */
  {
    path:'/dashboard/posts',
    name:'posts',
    component: () => import('@/views/dashboard/post/Index'),
    meta:{layout : 'dashboard' , auth : true},

  },
  {
    path:'/dashboard/post/create',
    name:'postCreate',
    component: () => import('@/views/dashboard/post/Create'),
    meta:{layout : 'dashboard' , auth : true},

  },
  {
    path:'/dashboard/post/:id',
    name:'postEdit',
    component: () => import('@/views/dashboard/post/Edit'),
    props:true,
    meta:{layout : 'dashboard' , auth : true},

  },
  /*
   * Laratrust routes
   */
  //roles
  {
    name: "roles",
    path: "/dashboard/roles",
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/role/Index'),
  },
  {
    name: "roleCreate",
    path: "/dashboard/role/create",
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/role/Create')
  },
  {
    name: "roleEdit",
    path: "/dashboard/role/edit/:id",
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/role/Edit'),
  },
  // role permissions
  {
    name: "rolePermissions",
    path: "/dashboard/role/:id/permissions",
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/role-permission/Index'),
  },
  {
    name: "rolePermissionCreate",
    path: "/dashboard/role/:id/permission/create",
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/role-permission/Create'),
  },
  // user role
  {
    name: 'userRoles',
    path: '/dashboard/user/:id/roles',
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/user-role/Index'),
  },
  {
    name: 'userRoleCreate',
    path: '/dashboard/user/:id/role/create',
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/user-role/Create'),
  },
  //permissions
  {
    name: "permissions",
    path: "/dashboard/permissions",
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/permission/Index'),
  },
  {
    name: "permissionCreate",
    path: "/dashboard/permission/create",
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/permission/Create'),
  },
  {
    name: "permissionEdit",
    path: "/dashboard/permission/edit/:id",
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/permission/Edit'),
  },
  // user permissions
  {
    name: "userPermissions",
    path: "/dashboard/user/:id/permissions",
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/user-permission/Index'),
  },
  {
    name: 'userPermissionCreate',
    path: '/dashboard/user/:id/permission/create',
    props: true,
    meta: { layout: 'dashboard'},
    component: () => import('@/views/dashboard/user-permission/Create'),
  },
  /**
   * Auth routes
   */
  {
    path: '/login',
    name: 'login',
    component: () => import('@/views/auth/Login'),
    meta: { layout: 'auth', guest: true },
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('@/views/auth/Register'),
    meta: { layout: 'auth', guest: true },
  },
  {
    path: '/forgot-password',
    name: 'forgotPassword',
    component: () => import('@/views/auth/forgotPassword'),
    meta: { layout: 'auth', guest: true },
  },
  {
    path: '/reset-password',
    name: 'resetPassword',
    component: () => import('@/views/auth/resetPassword'),
    meta: { layout: 'auth', guest: true },
  },
  {
    path: '/verify-email',
    name: 'verifyEmail',
    component: () => import('@/views/auth/verifyEmail'),
    meta: { layout: 'auth', guest: true },
  },
  {
    path: '/email/verify/:id/:hash',
    name: 'verifyEmailStatus',
    component: () => import('@/views/auth/verifyEmailStatus'),
    meta: { layout: 'auth', guest: true },
    props:true
  },
  {
    path: '/:pathMatch(.*)*',
    component: () => import('@/views/404/404.vue'),
  },
];

export default routes;
