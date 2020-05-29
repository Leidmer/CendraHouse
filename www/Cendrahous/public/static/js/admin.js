var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){
    if(route == "property_edit"){
        var btn_property_file_image = document.getElementById('btn_property_file_image');
        var property_file_image = document.getElementById('property_file_image');
        btn_property_file_image.addEventListener('click', function(){
            property_file_image.click();
        }, false);

        property_file_image.addEventListener('change', function(){
            document.getElementById('form_property_gallery').submit();
    });
    }
    route_active = document.getElementsByClassName('lk-'+route)[0].classList.add('active');
});

//EDITOR CKEDITOR
$(document).ready(function(){
    editor_init('editor');
})

function editor_init(field){
    CKEDITOR.replace(field,{
        toolbar: [
            {name: 'clipboard', items: [ 'Cut', 'Copy', 'Pase', 'PasteText', '-', 'Undo', 'Redo' ] },
            {name: 'basicstyles', items: [ 'Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote' ] },
            {name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }
        ]
    });
}

//MODAL
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })