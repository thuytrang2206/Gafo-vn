<template>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">
                <h6><font-awesome-icon :icon="['fas', 'house']" /> / Quản lý loại sản phẩm</h6>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createcategoryModal">
                    Thêm mới <font-awesome-icon :icon="['fas', 'plus']" />
                </button>

            </div>

        </div>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bảng loại sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã loại </th>
                                <th>Tên loại</th>
                                <th>Ngày cập nhật</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category, index) in category" :key="category.id">
                                <td>{{ index+1 }}</td>
                                <td>{{ category.IdTypeProd }}</td>
                                <td>{{ category.TypeTittle }}</td>
                                <td>{{ category.Update_date }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <!-- <div class="p-2">
                                            <button type="button" class="btn btn-info"><font-awesome-icon
                                                    :icon="['fas', 'eye']" /></button>
                                        </div> -->
                                        <div class="p-2">
                                            <button type="button" class="btn btn-primary"
                                                @click.prevent="editcategory(category,index)"><font-awesome-icon
                                                    :icon="['fas', 'pen-to-square']" /></button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-danger"
                                                @click="deletecategory(category, index)"><font-awesome-icon
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
            <div class="modal fade modal-xl" id="createcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" 
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="staticBackdropLabel">
                                <span v-if="!isEdit">Thêm mới loại sản phẩm</span>
                                <span v-else>Sửa loại sản phẩm</span>
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
                                        <span class="input-group-text">Tên loại sản phẩm</span>
                                        <input type="text" v-model="listcate.TypeTittle" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </form>
                        <div class="modal-footer">

                            <button type="button" v-show="!isEdit" @click="createcategory" class="btn btn-success">Tạo
                                mới</button>
                            <button type="button" v-show="isEdit" @click="updatecategory" class="btn btn-success"
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
            category: [],
            listcate: {
                TypeTittle: '',
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
        async createcategory() {
            try {
                this.isEdit = false;
                const response = await axios.post('category', {
                    TypeTittle: this.listcate.TypeTittle,
                })
                $('#createcategoryModal').modal('hide');
                this.getdata();
                // reset giá trị form về ban đầu
                this.listcate = {
                    TypeTittle: '',
                }
            } catch (error) {
                this.error = error.response.data
            }
        },
        async getdata() {
            try {
                const response = await axios.get('category')
                this.category = response.data
                this.isEdit = false;
            } catch (error) {
                this.error = error.response.data
            }
        },
        editcategory(category,index) {
            this.isEdit = true;
            $('#createcategoryModal').modal('show');
            this.editcategory = { ...category }
            this.listcate.TypeTittle = category.TypeTittle;
        },
        async updatecategory() {
            const response = await axios.put('category/'+ this.editcategory.id, {
                TypeTittle: this.listcate.TypeTittle,
            })
            this.category[this.editcategory.index] = response.data
            this.isEdit=false
            //this.getdata()
            location.reload()
        },
        async deletecategory(category, index) {
            try {
                await axios.delete('category/' + category.id)
                this.category.splice(index, 1)
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
