$(document).ready(function(){

    var d=0;

    $('[name="edit"]').click(function(e){
        if(d==0){
            
            d=1;
            $(this).text("Lưu");
            $(this).attr('name', 'save');

            $('input').removeAttr('disabled');
            $('select').removeAttr('disabled');
        }else{
            d=0;
            $(this).text("Chỉnh sửa");
            $(this).attr('name', 'edit');

            $('input').attr('disabled', 'disabled');
            $('select').attr('disabled', 'disabled');
        }
    })
})