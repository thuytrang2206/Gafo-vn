
<template>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <router-link to="/" class="sidebar-brand d-flex align-items-center justify-content-center">
            <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gafo Admin</div>
            </a> -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">Gafo Admin</div>
            </router-link>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <router-link to="/product" class="nav-link collapsed">
                    <span class="nav-link collapsed">Quản lý sản phẩm</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/category" class="nav-link collapsed">
                    <span class="nav-link collapsed">Quản lý loại sản phẩm</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/newstype" class="nav-link collapsed">
                    <span class="nav-link collapsed">Quản lý loại tin</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/new" class="nav-link collapsed">
                    <span class="nav-link collapsed">Quản lý tin tức</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/customer" class="nav-link collapsed">
                    <span class="nav-link collapsed">Quản lý khách hàng</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/employee" class="nav-link collapsed">
                    <span class="nav-link collapsed">Quản lý nhân viên</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/revenue" class="nav-link collapsed">
                    <span class="nav-link collapsed">Thống kê doanh thu</span>
                </router-link>
            </li>
           

        </ul>
        <!-- End of Sidebar -->

</template>
<script >
// import Footerbottom from './footer.vue'
// import Content from '../../admin/index.vue'
// import Search from '../../admin/search.vue'
// export default {
//     name: 'Headertop',
//     components: {
//         Footerbottom,
//         Content,
//         Search,
//     },
// }

</script>
<style scoped></style>