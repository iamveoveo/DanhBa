$(document).ready(function(){

    var validExt = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    
    $('[type="file"]').on('change', function(){
      if(this.files[0].size>5000000 || jQuery.inArray(this.files[0].type, validExt) == -1){
        $('.alert').text("Tệp tải lên không hợp lệ!");
      }
    })

})