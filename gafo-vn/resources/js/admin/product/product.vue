

<template>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">
                <h6><font-awesome-icon :icon="['fas', 'house']" /> / Quản lý sản phẩm</h6>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button @click="addProduct" type="button" class="btn btn-primary" >
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
                            <tr v-for="(products, index) in product" :key="products.id">
                                <td>{{ index+1 }}</td>
                                <td>{{ products.NameProd }}</td>
                                <td></td>
                                <td>{{ products.Price.toLocaleString() }}</td>
                                <td></td>
                                <td>{{ products.Update_date }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <!-- <div class="p-2">
                                            <button type="button" class="btn btn-info"><font-awesome-icon
                                                    :icon="['fas', 'eye']" /></button>
                                        </div> -->
                                        <div class="p-2">
                                            <a href="#" @click.prevent="editProduct(products)"><font-awesome-icon
                                                    :icon="['fas', 'pen-to-square']" /></a>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-danger"
                                                @click="deleteProduct(products, index)"><font-awesome-icon
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
            <div class="modal fade modal-xl" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="staticBackdropLabel">
                                <span v-if="isEdit">Sửa sản phẩm</span>
                                <span v-else>Thêm mới sản phẩm</span>
                            </h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                             ></button>
                        </div>

                        <Form ref="form" @submit="handleSubmit" :validation-schema="isEdit?editschema:createschema" v-slot="{ errors }" :initial-values="formValues">
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Tên sản phẩm</span>
                                        <Field type="text" name="NameProd"  id="NameProd" class="form-control" :class="{'is-invalid':errors.NameProd}"/>
                                        <span class="invalid-feedback">{{ errors.NameProd }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Giá sản phẩm</span>
                                        <Field type="number" name="Price" id="Price" class="form-control"/>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Số lượng</span>
                                        <Field type="number" name="Count" id="Count" class="form-control"/>
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
                        
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </Form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup >
import { ref, onMounted, reactive} from 'vue';
import {Form , Field} from 'vee-validate';
import * as yup from 'yup';
const product= ref([]);
const isEdit= ref(false);
const formValues= ref();
const form = ref(null)
const getdata = () =>{
    axios.get('product')
    .then((response)=>{
        product.value= response.data
    })
};
onMounted(() => {
  getdata();
});
const addProduct=()=>{
    isEdit.value= false;
    $('#createProductModal').modal('show');
}
const createschema= yup.object({
    NameProd:yup.string().required(),
}).required();
const editschema= yup.object({
    NameProd:yup.string().required(),
}).required();
const createProduct=(value,{resetForm})=>{
    axios.post('product',value)
    .then((response)=>{
        product.value.unshift(response.data)
        $('#createProductModal').modal('hide');
        resetForm();
    })
}
const editProduct=(products)=>{
    isEdit.value= true;
    form.value.resetForm();
    $('#createProductModal').modal('show');
    formValues.value={
       NameProd: products.NameProd
    } ;
    
}
const handleSubmit=(products)=>{
    if(isEdit.value){
        updateProduct(products)
    }
    else{
        createProduct(products)
    }
}
const updateProduct=(products)=>{
    axios.put('product/'+ formValues.value.id)
    .then((response)=>{
        const index= product.value.findIndex(products=>product.id===response.data.id);
        product.value[index]=response.data;
        $('#createProductModal').modal('hide');
    })
}
// const createProduct=()=>{
//     axios.post('product',form)
//     .then((response)=>{
//         product.value.push(response.data)
//         form.NameProd='';
//         form.Price=0;
//         form.Count=0;
//         $('#createProductModal').modal('hide');
//     })
// }
</script>

<style lang="scss" scoped></style>