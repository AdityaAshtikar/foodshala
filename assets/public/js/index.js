$(document).ready(function() {

    // modal autofocus and show::debug
    addMenuModal = $('#addMenuModal');
    // addMenuModal.modal();
    addMenuModal.on('shown.bs.modal', function() {
        $('#item-name').trigger('focus');
    });

    // image preview
    let photoPreviewElem = $('#preview-menu-item-image');
    // let foodPhoto = '';
    let foodPhotoinput = $("#food-photo");
    // console.log(photoPreviewElem);
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();  
            reader.onload = function(e) {
                $(photoPreviewElem).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $(photoPreviewElem).removeClass("d-none");
        }
    }

    $(foodPhotoinput).change(function() {
        readURL(this);
    });

    // delete photo preview and input
    photoPreviewElem.click(function() {
        $(this).addClass("d-none");
        $(foodPhotoinput).val("");
    });

    let addItemForm = $("#add-food-item-form");

    if ( $( "#errorAddMenu" ).length ) {
        addMenuModal.modal();
    }
    
});