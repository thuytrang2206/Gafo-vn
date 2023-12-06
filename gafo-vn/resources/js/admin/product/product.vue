

<template>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">
                <h6><font-awesome-icon :icon="['fas', 'house']" /> / Quản lý sản phẩm</h6>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success">Thêm mới <font-awesome-icon
                        :icon="['fas', 'plus']" /></button>
            </div>

        </div>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Khuyến mãi</th>
                                <th>Ngày cập nhật</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in product" :key="item.id">

                                    <td>{{ item.IdProd }}</td>
                                    <td>{{ item.NameProd }}</td>
                                    <td></td>
                                    <td>{{ item.Price }}</td>
                                    <td></td>
                                    <td>{{ item.Update_date }}</td>
                                    <td>
                                    <div class="d-flex justify-content-end">
                                        <div class="p-2">
                                            <button type="button" class="btn btn-info"><font-awesome-icon
                                                    :icon="['fas', 'eye']" /></button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-primary"><font-awesome-icon
                                                    :icon="['fas', 'pen-to-square']" /></button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-danger"><font-awesome-icon
                                                    :icon="['fas', 'trash']" /></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            product: []
        }
    },
    mounted() { 
        this.getdata()
    },
    methods: {
        async getdata() {
            try {
                   const response = await axios.get('/admin/product')
                   this.product = response.data
               } catch (error) {
                   this.error = error.response.data
               }
        }
    } 
}
</script>

<style lang="scss" scoped></style>