import Headertop from '../layout/admin/header.vue'

import Product from '../admin/product.vue'

const routes = [
  {
    path: '/',
    component: Headertop,
    children: [
        {
          path: 'product',
          component: Product
        },  
      ]
  },
  {
    path: '/:catchAll(.*)',
    component: Error,
  },
]

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes
