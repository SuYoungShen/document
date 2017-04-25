$(document).ready(function() {

  Blurs("#Shelf_Number");
  Blurs("#Journal");
  Blurs("#Classification");
  Blurs("#Publication");
  Blurs("#Classification");
  Blurs("#Language");
  Blurs("#Budget");
  Blurs("#Money");
  Blurs("#Source");

  $("#form").validate({//當按送出時做驗證
    rules: {
      Shelf_Number:"required",
      Journal:"required",
      Classification:"required",
      Publication:"required",
      Language:"required",
      Budget:"required",
      Money:"required",
      Source:"required"
    },
    messages:{
      Shelf_Number:"必填",
      Journal:"必填",
      Classification:"必填",
      Publication:"必填",
      Language:"必填",
      Budget:"必填",
      Money:"必填",
      Source:"必填"
    }
  });
});

function Blurs(values){

  value = values;

  $(value).blur(function(event) {
    if ($(this).val()=="") {
      $(this).css("border-color","red");

    }else {
      $(this).css("border-color","green");
      return $(this).val();
    }
  });
}
