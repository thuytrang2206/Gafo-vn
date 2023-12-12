import Content from '../admin/index.vue'

import Product from '../admin/product/product.vue'
import Category from '../admin/category.vue'
import Employee from '../admin/employee.vue'
import Customer from '../admin/customer.vue'
import New from '../admin/new.vue'
import Newstype from '../admin/newstype.vue'
import Revenue from '../admin/revenue.vue'
import Slidebar from '../admin/slidebar.vue'

const routes = [
  {
    path: '/',
    component: Content,
    // children: [
    //     {
    //       path: 'product',
    //       name:'product',
    //       component: Product
    //     },  
    //   ]
  },
 
  {
      path: '/product',
      component: Product
  },
  {
      path: '/category',
      component: Category
  },
  {
    path: '/employee',
    component: Employee
  },
  {
    path: '/customer',
    component: Customer
  },
  {
    path: '/new',
    component: New
  },
  {
    path: '/newstype',
    component: Newstype
  },
  {
    path: '/revenue',
    component: Revenue
  },
  {
    path: '/slidebar',
    component: Slidebar
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
