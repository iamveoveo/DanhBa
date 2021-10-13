$(document).ready(function(){

    var validExt = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    
    $(".form-control[type=file]").on('change',function(){
      console.log(this.files[0].name);
      /* if(this.files[0].size>5000000 || jQuery.inArray(this.files[0].type, validExt) == -1){
        $('.alert').text("Tệp tải lên không hợp lệ!");
      } */
      /* console.log(this.files[0].name);
      $('#image_name').attr("src", "images/"+this.files[0].name); */
    })

    $('form').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        formData.append('submit','');
        console.log();

        $.ajax({
            url: "update-profile.php",
            method: 'POST',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
              if(formData.get('file_image').name != ''){
                $(".image_name").attr("src", 'images/' + formData.get('file_image').name);
              }
              $("[name='name']").val(formData.get('name'));
              $('.name').text(formData.get('name'));
              $("[name='ngaysinh']").val(formData.get('ngaysinh'));
              $("select[name='gioitinh'] option[value='"+formData.get('gioitinh')+"']").prop('selected', true);
              $("[name='sdt   ']").val(formData.get('sdt'));
              $("[name='diachi']").val(formData.get('diachi'));
            },
            error: function(){
              alert("LỖI!");
            }
        })
    })

})