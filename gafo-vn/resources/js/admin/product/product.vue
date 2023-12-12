<template>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">
                <h6><font-awesome-icon :icon="['fas', 'house']" /> / Quản lý sản phẩm</h6>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
                    Thêm mới <font-awesome-icon :icon="['fas', 'plus']" />
                </button>

            </div>

        </div>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm</h6>
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
                            <tr v-for="(product, index) in product" :key="product.id">
                                <td>{{ index+1 }}</td>
                                <td>{{ product.NameProd }}</td>
                                <td></td>
                                <td>{{ product.Price.toLocaleString() }}</td>
                                <td></td>
                                <td>{{ product.Update_date }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <!-- <div class="p-2">
                                            <button type="button" class="btn btn-info"><font-awesome-icon
                                                    :icon="['fas', 'eye']" /></button>
                                        </div> -->
                                        <div class="p-2">
                                            <button type="button" class="btn btn-primary"
                                                @click.prevent="editProduct(product,index)"><font-awesome-icon
                                                    :icon="['fas', 'pen-to-square']" /></button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-danger"
                                                @click="deleteProduct(product, index)"><font-awesome-icon
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

        <!-- Thêm mới sản phẩm -->
        <div class="row">
            <!-- Modal -->
            <div class="modal fade modal-xl" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" 
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="staticBackdropLabel">
                                <span v-if="!isEdit">Thêm mới sản phẩm</span>
                                <span v-else>Sửa sản phẩm</span>
                            </h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                @click="Cancel"></button>
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" v-if="error">
                            <b>{{ error.message }}</b>
                            <ul>
                                <li v-for="(errorName, index) in error.errors" :key="index">
                                    {{ errorName[0] }}
                                </li>
                            </ul>
                            <button type="button" class="close" @click="error = null">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="form-data">
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Tên sản phẩm</span>
                                        <input type="text" v-model="listprd.NameProd" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Giá sản phẩm</span>
                                        <input type="number" v-model="listprd.Price" class="form-control">
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Số lượng</span>
                                        <input type="number" v-model="listprd.Count" class="form-control">
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Loại sản phẩm</label>
                                        <select class="form-select" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- <div class="p-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Loại sản phẩm</label>
                                        <select class="form-select" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Số lượng</span>
                                        <input type="number" class="form-control">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        </form>
                        <div class="modal-footer">

                            <button type="button" v-show="!isEdit" @click="createProduct" class="btn btn-primary">Tạo
                                mới</button>
                            <button type="button" v-show="isEdit" @click="updateProduct" class="btn btn-secondary"
                                data-bs-dismiss="modal">Sửa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {

    data() {
        return {
            product: [],
            listprd: {
                NameProd: '',
                Price: 0,
                Count: 0,
            },
            error: null,
            
        }
    },
    created() {
        this.getdata()
    },
    // mounted() {
    //     this.getdata()
    // },
    methods: {
        async createProduct() {
            try {
                this.isEdit = false;
                const response = await axios.post('product', {
                    NameProd: this.listprd.NameProd,
                    Price: this.listprd.Price,
                    Count: this.listprd.Count,
                })
                $('#createProductModal').modal('hide');
                this.getdata();
                // reset giá trị form về ban đầu
                this.listprd = {
                    NameProd: '',
                    Price: 0,
                    Count: 0,
                }
            } catch (error) {
                this.error = error.response.data
            }
        },
        async getdata() {
            try {
                const response = await axios.get('product')
                this.product = response.data
                this.isEdit = false;
            } catch (error) {
                this.error = error.response.data
            }
        },
        editProduct(product,index) {
            this.isEdit = true;
            $('#createProductModal').modal('show');
            this.editProduct = { ...product }
            this.listprd.NameProd = product.NameProd;
            this.listprd.Price = product.Price;
            this.listprd.Count = product.Count;
        },
        async updateProduct() {
            const response = await axios.put('product/'+ this.editProduct.id, {
                NameProd: this.listprd.NameProd,
                Price: this.listprd.Price,
                Count: this.listprd.Count,
            })
            this.product[this.editProduct.index] = response.data
            this.isEdit=false
            //this.getdata()
            location.reload()
        },
        async deleteProduct(product, index) {
            try {
                await axios.delete('product/' + product.id)
                this.product.splice(index, 1)
            } catch (error) {
                this.error = error.response.data
            }
        },
        Cancel(){
            location.reload()
            this.getdata()
        }
    }
}
</script>

<style lang="scss" scoped></style>
