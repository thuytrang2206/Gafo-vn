<template>
      <!-- Page Wrapper -->
        <div id="wrapper">
            <headertop></headertop>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                
                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                <search></search>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <router-view></router-view>

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footerbottom></footerbottom>
                <!-- End of Footer -->

                </div>
        <!-- End of Content Wrapper -->
        </div>
   
</template>

<script>
import Footerbottom from './layout/admin/footer.vue'
import Headertop from './layout/admin/header.vue'
import Search from './admin/search.vue'
export default {
    name: 'Admin',
    components: {
        Footerbottom,
        Headertop,
        Search,
    },
}

</script>
<style >

</style>    