<template>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">
                <h6><font-awesome-icon :icon="['fas', 'house']" /> / Quản lý loại sản phẩm</h6>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createimageModal">
                    Thêm mới <font-awesome-icon :icon="['fas', 'plus']" />
                </button>

            </div>

        </div>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hình ảnh</th>
                                <th>Tên hình ảnh</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(image, index) in image" :key="image.id">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    <!-- <img :src="{{ image.pi }}" alt=""> -->
                                </td>
                                <td>{{ image.title  }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <!-- <div class="p-2">
                                            <button type="button" class="btn btn-info"><font-awesome-icon
                                                    :icon="['fas', 'eye']" /></button>
                                        </div> -->
                                        <div class="p-2">
                                            <button type="button" class="btn btn-primary"
                                                @click.prevent="editImage(image, index)"><font-awesome-icon
                                                    :icon="['fas', 'pen-to-square']" /></button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-danger"
                                                @click="deleteImage(image, index)"><font-awesome-icon
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

        <!-- Thêm mới sliderbar-->
        <div class="row">
            <!-- Modal -->
            <div class="modal fade modal-xl" id="createimageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="staticBackdropLabel">
                                <span v-if="!isEdit">Thêm mới sliderbar</span>
                                <span v-else>Sửa sliderbar</span>
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

                                <div class="d-flex">
                                    <div class="col-4">
                                        <div>
                                            <input type="file" accept="image/*" @change="previewImage" class="form-control-file" id="my-file">
                                        </div>
                                        <br>

                                        <input type="text" class="form-control" v-model="listimage.title" >
                                        <br>
                                    </div>
                                    <div class="col-8">
                                        <div> 
                                            <button type="button" class="btn btn-danger" id="deleteImage"
                                                style="float: right;"><font-awesome-icon
                                                    :icon="['fas', 'xmark']" /></button>

                                                </div>
                                        <div class="image">
                                            <img :src="preview" class="img-fluid" style="width: 530px;height: 400px;" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                        <div class="modal-footer">

                            <button type="button" v-show="!isEdit" @click="addImage" class="btn btn-success">Tạo
                                mới</button>
                            <button type="button" v-show="isEdit" @click="updateimage" class="btn btn-success"
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

            listimage: {
                title: '',
                file:null
            },
            error: null,
            preview: null,
            image: null,
        }
    },
    created() {
        this.getdata()
    },
    // mounted() {
    //     this.getdata()
    // },
    methods: {

            previewImage: function(event) {
        var input = event.target;
        if (input.files) {
            var reader = new FileReader();
            reader.onload = (e) => {
            this.preview = e.target.result;
            }
            this.image=input.files[0];
            reader.readAsDataURL(input.files[0]);
            $(".image").show();
        }
        },
        async addImage() {
            try {
                const response = await axios.post('slidebar', {
                    title: this.listimage.title,
                })
                $('#createimageModal').modal('hide');
                this.getdata();
                // reset giá trị form về ban đầu
                this.listimage = {
                    title:'',
                    file:''
                }
            } catch (error) {
                this.error = error.response.data
            }
        },
        async getdata() {
                try {
                    const response = await axios.get('slidebar')
                    $(".image").hide();
                    $("#deleteImage").hide();
                    this.image = response.data
                    //this.isEdit = false;
                } catch (error) {
                    this.error = error.response.data
                }
        },
        //     editimage(image,index) {
        //         this.isEdit = true;
        //         $('#createimageModal').modal('show');
        //         this.editimage = { ...image }
        //         this.listcate.TypeTittle = image.TypeTittle;
        //     },
        //     async updateimage() {
        //         const response = await axios.put('image/'+ this.editimage.id, {
        //             TypeTittle: this.listcate.TypeTittle,
        //         })
        //         this.image[this.editimage.index] = response.data
        //         this.isEdit=false
        //         //this.getdata()
        //         location.reload()
        //     },
        //     async deleteimage(image, index) {
        //         try {
        //             await axios.delete('image/' + image.id)
        //             this.image.splice(index, 1)
        //         } catch (error) {
        //             this.error = error.response.data
        //         }
        //     },
        //     Cancel(){
        //         location.reload()
        //         this.getdata()
        //     }
    }
}
</script>

<style lang="scss" scoped></style>
