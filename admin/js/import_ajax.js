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
})