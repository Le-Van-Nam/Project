//assets/js/script.js

$(document).ready(function () {

  function readURL(input) {
    //hàm readURL có tác dụng hiển thị ảnh preview khi upload
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-preview').attr('src', e.target.result).show();
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("input[type=file]").change(function () {
    readURL(this);

  });
});