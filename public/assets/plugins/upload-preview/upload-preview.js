// Author : Mohamed Abidar
// Created at: 29/07/2016
// Last update : 29/07/2016


$(document).ready(function() {

  function readURL(input) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#image-preview').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#image-upload").change(function(){
      readURL(this);
  });

});
