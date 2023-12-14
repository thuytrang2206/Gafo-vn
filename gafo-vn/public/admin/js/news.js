$(function(){
    $("#selectPostType").select2();
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );
})