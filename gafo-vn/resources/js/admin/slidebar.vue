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
                            <tr v-for="(image, index) in images" :key="image.id">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    <img :src="image.pathimage" style="    width: 100px;height: 100px;">
                                </td>
                                <td>{{ image.title }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <!-- <div class="p-2">
                                            <button type="button" class="btn btn-info"><font-awesome-icon
                                                    :icon="['fas', 'eye']" /></button>
                                        </div> -->
                                        <div class="p-2">
                                            
                                            <button type="button" @click.prevent="editImage(image, index)" class="btn btn-primary"><font-awesome-icon
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

        <!-- Thêm mới/Sửa sliderbar-->
        <div class="row">
            <!-- Modal -->
            <div class="modal fade modal-xl" id="createimageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                <span v-if="!isEdit">Thêm mới sliderbar</span>
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
                        <form id="form-data" @submit.prevent="submitForm" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="d-flex">
                                    <div class="card p-3 shadow" style="width:auto;">
                                        <nav>
                                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-home" type="button" role="tab"
                                                    aria-controls="nav-home" aria-selected="true">Tải file</button>
                                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-profile" type="button" role="tab"
                                                    aria-controls="nav-profile" aria-selected="false">Media</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content p-3 border bg-light" id="nav-tabContent"
                                            style="height:500 ; width: 1038px;">
                                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <div>
                                                    <input type="file" name="file" id="file" class="input-file"
                                                        v-on:change="previewImage">
                                                    <label for="file" class="btn btn-tertiary js-labelFile">
                                                        <i class="icon fa fa-check"></i>
                                                        <span class="js-fileName">Choose a file</span>
                                                    </label>
                                                    <div>
                                                        <br>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text" id="addon-wrapping">Tên
                                                                ảnh</span>
                                                            <input type="text" class="form-control" v-model="title"
                                                                aria-describedby="addon-wrapping">
                                                        </div>
                                                        <br>
                                                        <div class="image d-flex">
                                                            <div class="p-2">
                                                            <img :src="preview" class="img-fluid" style="width: 100px; height: 100px;"/>
                                                            </div>
                                                            <div class="p-2">
                                                                {{ file.name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">
                                                <div class="d-flex">
                                                    <div class="p-2" v-for="image in images" :key="image.id">
                                                            <img :src="image.pathimage" class=" img-thumbnail" style="width: 100px; height: 100px;"/>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" v-show="!isEdit" class="btn btn-success">Tạo
                                    mới</button>
                                <button type="submit" v-show="isEdit" class="btn btn-success">Sửa</button>
                            </div>
                        </form>
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

            // listimage: {
            //     title: '',
            //     file:''
            // },
            title: '',
            file: '',
            error: null,
            preview: null,
            images: {}
        }
    },
    // created() {
    //     this.getdata()
    // },
    mounted() {
        this.getdata()
    },
    methods: {
        previewImage: function (event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                }
                this.file = input.files[0];
                reader.readAsDataURL(input.files[0]);
                $(".image").show();
            }
        },
        async submitForm(event) {
            event.preventDefault();
            let currentObj = this;
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('title',this.title);
            if(isEdit==false){
                axios.post('slidebar', formData, config)
                .then(function (response) {
                    // currentObj.success = response.data.success;
                    $('#createimageModal').modal('hide');
                    this.getdata();
                    location.reload();
                    this.title = '';
                    this.file = '';
                    // location.reload()
                })
                .catch(function (error) {
                    //currentObj.output = error;
                });
            }
            else{
                axios.put('slidebar' + this.editImage.id, formData, config)
                .then(function (response) {
                    // currentObj.success = response.data.success;
                    $('#createimageModal').modal('hide');
                    this.images[this.editImage.index] = response.data
                    this.isEdit=false
                    location.reload();
                })
                .catch(function (error) {
                    //currentObj.output = error;
                });
            }
           
        },

        async getdata() {
            try {
                const response = await axios.get('slidebar')
                $(".image").hide();
                $("#deleteImage").hide();
                this.images = response.data
                this.isEdit = false;
            } catch (error) {
                this.error = error.response.data
            }
        },

        editImage(image,index) {
            this.isEdit = true;
            $('#createimageModal').modal('show');
            this.editImage = { ...image }
            this.title = image.title;
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
        async deleteImage(image, index) {
                try {
                    await axios.delete('slidebar/' + image.id)
                    this.images.splice(index, 1)
                } catch (error) {
                    this.error = error.response.data
                }
        },
        //     Cancel(){
        //         location.reload()
        //         this.getdata()
        //     }
    }
}
</script>

<style lang="scss" scoped>
.btn-tertiary {
    color: #555;
    padding: 0;
    line-height: 40px;
    width: 300px;
    margin: auto;
    display: block;
    border: 2px solid #555;

    &:hover,
    &:focus {
        color: lighten(#555, 20%);
        border-color: lighten(#555, 20%);
    }
}

/* input file style */

.input-file {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;

    +.js-labelFile {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding: 0 10px;
        cursor: pointer;

        .icon:before {
            //font-awesome
            content: "\f093";
        }

        &.has-file {
            .icon:before {
                //font-awesome
                content: "\f00c";
                color: #5AAC7B;
            }
        }
    }
}</style>
