import DashboardLayout from '../layout/admin/DashboardLayout.vue'
// GeneralViews

// Admin pages
// import Overview from 'src/pages/Overview.vue'
// import UserProfile from 'src/pages/UserProfile.vue'
// import TableList from 'src/pages/TableList.vue'
// import Typography from 'src/pages/Typography.vue'
// import Icons from 'src/pages/Icons.vue'
// import Maps from 'src/pages/Maps.vue'
// import Notifications from 'src/pages/Notifications.vue'
// import Upgrade from 'src/pages/Upgrade.vue'

const routes = [
  {
    path: '/',
    component: DashboardLayout,
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