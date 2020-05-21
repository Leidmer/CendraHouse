var base = location.protocol+'//'+location.host;


//Amb aquesta part simulem que al clicar en el + de la galeria estem clican Seleccionar archivo
document.addEventListener('DOMContentLoaded', function(){
    var btn_property_file_image = document.getElementById('btn_property_file_image');
    var property_file_image = document.getElementById('property_file_image');
    btn_property_file_image.addEventListener('click', function(){
        property_file_image.click();
    }, false);

    property_file_image.addEventListener('change', function(){
        document.getElementById('form_property_gallery').submit();
    });
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