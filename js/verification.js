$(document).ready(function() {
  //當焦點不在指定上,會進行以下程式
  $("#Recipient").blur(function() {
   Recipient = $("#Recipient").val();
    if (Recipient == "") {
      $(this).css('border-color', 'red');
    }else {
      $(this).css('border-color', 'green');
    }

  });

  $("#Address").blur(function() {
    Address = $("#Address").val();
    if (Address == "") {
      $(this).css('border-color', 'red');
    }else {
      $(this).css('border-color', 'green');
    }
  });

  $("#Number").blur(function() {
    Numbers = $("#Number").val();
    if (Numbers == "") {
      $(this).css('border-color', 'red');
    }else {
      $(this).css('border-color', 'green');
    }
  });

  //當焦點不在指定上,會進行以下程式

  //當按送出時,會進行以下程式
  $("form").submit(function() {
    if (Recipient == "") {
      alert("收件人不能為空");
      return false;//回傳false就不會跳到下頁
    }else if (Address == "") {
      alert("地址不能為空");
      return false;//回傳false就不會跳到下頁
    }else if (Numbers == ""){
      alert("郵件號碼不能為空");
      return false;//回傳false就不會跳到下頁
    }
  });
  //當按送出時,會進行以下程式
});
