// find textarea inputs and check if exist on page init ckeditor
var createPostEditor = document.getElementById('editor1');
var editPostEditor = document.getElementById('editor2');

if(createPostEditor){
    CKEDITOR.replace('editor1');
}

if(editPostEditor){
    CKEDITOR.replace('editor2');
}