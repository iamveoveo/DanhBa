$(document).ready(function(){

  var id = $('#id').text();
  var validExt = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
  var newFileName ="";

  $(".form-control[type=file]").on('change',function(){
    if(this.files[0].size>5000000 || jQuery.inArray(this.files[0].type, validExt) == -1){
      $('.alert').text("Tệp tải lên không hợp lệ!");
    }else{
      $("#image_name").attr("src", URL.createObjectURL(this.files[0]));

      var dt = new Date();
      newFileName = id + String(dt.getFullYear()) + String(dt.getMonth()+1) + String(dt.getDate()) + String(dt.getHours()) + String(dt.getMinutes()) + String(dt.getSeconds()) + "." + this.files[0].name.split('.').pop().toLowerCase();
    }
  })

  $("[name='edit']").click(function(){
    $("#image_name").attr("src", $("#image_name1").attr("src"));
  })

  $('#profile_form').on('submit', function(event) {
      event.preventDefault();
      var formData = new FormData(this);
      formData.append('submit','');
      formData.append('newFileName', newFileName);
      console.log();

      $.ajax({
          url: "update-profile.php",
          method: 'POST',
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            if(formData.get('file_image').name != ''){
              $(".image_name").attr("src", 'images/' + newFileName);
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