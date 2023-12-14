
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

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"  data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <span><font-awesome-icon :icon="['fas', 'gear']" /> General </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/product" class="collapse-item">
                        <span >Sản phẩm</span>
                    </router-link>
                    <router-link to="/category" class="collapse-item">
                        <span >Loại sản phẩm</span>
                    </router-link>
                    <router-link to="/post" class="collapse-item">
                        <span >Bài viết</span>
                    </router-link>
                    <router-link to="/customer" class="collapse-item">
                        <span >Khách hàng</span>
                    </router-link>
                    <router-link to="/employee" class="collapse-item">
                        <span >Nhân viên</span>
                    </router-link>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                
                <span> <font-awesome-icon :icon="['fas', 'display']" /> Giao diện </span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <router-link to="/slidebar" class="collapse-item">
                        <span >Slidebar</span>
                    </router-link>
                    
                </div>
            </div>
        </li>
        <li class="nav-item">
            <router-link to="/revenue" class="nav-link" >
                <span ><font-awesome-icon :icon="['fas', 'chart-simple']" /> Thống kê doanh thu</span>
            </router-link>
        </li>


    </ul>
    <!-- End of Sidebar -->
</template>
<script >


</script>
<style scoped></style>