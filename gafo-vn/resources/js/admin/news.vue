<template>
    <div class="container-fluid">
        <div class="row" style="border: solid 1px #5555556b;">
            <div class="col-3">
                <div class="d-flex">
                <div class="p-2"> <strong>Loại tin </strong></div>
                <div class="p-2">
                    <select id="js-select2" class="">
                        <option value="0">Chọn loại tin </option>
                        <option>Kiến thức dinh dưỡng</option>
                        <option>Hỏi đáp dinh dưỡng</option>
                        <option>Tư vấn dinh dưỡng</option>
                    </select>
                </div>
                <div class="p-2">
                    <button type="button" id="addTypepost" class="btn btn-outline-primary btn-sm" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Thêm mới
                        <font-awesome-icon :icon="['fas', 'plus']" /></button>
                </div>

            </div>
            </div>
            <div class="col-6 collapse" id="collapseExample">
                <div class="d-flex addtype" id="collapseExample">
                    <div class="p-2"><input type="text" class="form-control form-control-sm" v-model="name"> </div>
                    <div class="p-2"><button type="button" @click="saveType" class="btn btn-outline-success btn-sm">Lưu</button></div>
            </div>
            </div>
           
            
        </div>
    <br>
    <div class="row">
        <div class="d-flex">
            <table class="infopost">
                <tr>
                    <td><strong class="strongsize">Tiêu đề bài viết</strong></td>
                    <td><input type="text" class="form-control form-control-sm"></td>
                    <br>
                </tr>
                <tr>
                    <td><strong class="strongsize">Nội dung bài viết</strong></td>
                    <td><textarea name="body" id="body" cols="30" rows="30" class="form-control ckeditor"></textarea></td>
                    <br>
                </tr>
                <tr>
                    <td><strong class="strongsize">Logo bài viết</strong></td>
                    <td>
                        <div style="border: 1px solid #ccced1;">
                            <div class="imagepreview"></div>
                            <div class="Logo"><input type="file" name="file" id="file" class="input-file"
                                    v-on:change="previewImage">
                                <label for="file" class="btn btn-tertiary js-labelFile">
                                    <i class="icon fa fa-check"></i>
                                    <span class="js-fileName">Choose a file</span>
                                </label>
                            </div>
                        </div>
                    </td>
                    <br>
                </tr>
                <tr>
                    <td><strong class="strongsize">Link Youtube</strong></td>
                    <td><input type="text" class="form-control form-control-sm"></td>
                    <br>
                </tr>
                <tr>
                    <td></td>
                    <td> <button class="btn btn-success">Tạo</button></td>
                </tr>
            </table>
        </div>
    </div>
    <br>

</div>
</template>
<script>

export default {
    // data:{
    //     return:{
    //         name:'',
    //         listposttype:[]
    //     }
    // },
    // method: {
    //     // async saveType(){
    //     //     try {
    //     //         const response = await axios.post('product', {
    //     //             name: this.name,
    //     //         })
    //     //         this.getPostType();
    //     //         // reset giá trị form về ban đầu
    //     //        this.name='';
    //     //     } catch (error) {
    //     //         this.error = error.response.data
    //     //     }
    //     // },
    //     // async getPostType(){
    //     //     try {
    //     //         const response = await axios.get('posttype')
    //     //         this.name = response.data
    //     //     } catch (error) {
    //     //         this.error = error.response.data
    //     //     }
    //     // }
    // }

}
</script>

<style lang="scss" scoped>
.infopost {
    min-width: 1000px;
}

.strongsize {
    font-size: 12px;
}

.imagepreview {
    height: 400px;
}

.ckeditor {
    height: 300px;
}

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