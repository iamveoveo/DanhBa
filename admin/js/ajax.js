$(document).ready(function(){
    $("#file_import").on("submit", function(event){
        event.preventDefault();
        var formData = new FormData(this);
        formData.append("display_import", "");
        $.ajax({
            url: "display_import.php",
            method: 'POST',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                $('#modal_body').html(data);
            }
        })
    })
    
    var form_import =  $("#file_import");

    $('button[name="import"]').on("click", function(){
        var formData = new FormData(file_import_form);
        formData.append("import", "");
        $.ajax({
            url: "export_import.php",
            method: 'POST',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                $(".table100").html(data);
            }
        })
    })

    $('input[name="input_search"]').on("input", function(){
        var a = $('input[name="input_search"]').val();
        if(a != ""){
            $.ajax({
                url: "search.php",
                method: 'POST',
                type: "POST",
                data: {search_:a, searching:""},
    /*             processData: false,
                contentType: false, */
                success: function(data){
                    $('.search-suggest').css("display", "block");
                    $('.search-suggest').html(data);
                }
            })
        }
        else{
            $('.search-suggest').css("display", "none");
            $('.search-suggest').html("");
        }
    }) 

    $('button[name="search_btn"]').on("click", function(){
        var a = $('input[name="input_search"]').val();
        $.ajax({
            url: "search.php",
            method: 'POST',
            type: "POST",
            data: {search_:a, search_result:""},
/*             processData: false,
            contentType: false, */
            success: function(data){
                $("tbody").html(data);
                $('.search-suggest').css("display", "none");
            }
        })
    })
})

function suggest_click(e){
    $('input[name="input_search"]').val($(e).text());
}