$(document).ready(function(){
    $('#product_form').prepend('<input id="submitSaveProductForm" name="submitProductForm" type="hidden">');
    
    $(document).on('mouseenter', '#product_form button[name="submitAddproduct"]', function(){
        $('#product_form input#submitSaveProductForm').attr('name','submitAddproduct');
    });
    
    $(document).on('mouseenter', '#product_form button[name="submitAddproductAndStay"]', function(){
        $('#product_form input#submitSaveProductForm').attr("name","submitAddproductAndStay");
    });
});
