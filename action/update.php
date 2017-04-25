<?php
  include '../connect/connect.php';

  $id = (isset($_POST["id"]) && !empty($_POST["id"]))?$_POST["id"]:"";
  $bookname = (isset($_POST["BookName"]) && !empty($_POST["BookName"]))?trim($_POST["BookName"]):"";//書名
  $url = (isset($_POST["Url"]) && !empty($_POST["Url"]))?trim($_POST["Url"]):"";//網址


  if (isset($_POST["De"])) {//點擊刪除會執行這行

    $true = $db->query(del($id));
    $Msg = "刪除";

  }else if(isset($_POST["Up"])){//點擊更新會執行這行

    $true = $db->query(update($id, $bookname, $url));
    $Msg = "更新";

  }

  if ($true) {
    message($Msg, "成功");
  }else {
    message($Msg, "失敗");
  }

  function message($msg, $how){
    echo "
          <script>
            msg = '$msg';
            how = '$how';
            alert(msg+how);
            document.location.href='../show.php';
          </script>
          ";
  }

  //個別更新
  function update($id, $bookname, $url){
    $up = "UPDATE `bookname` SET `bookname`='".$bookname."',`url`='".$url."' WHERE `id`='".$id."'";
    return $up;
  }
  //個別更新

  //個別刪除
  function del($id){
    $de = "DELETE  FROM `bookname` WHERE `id`='".$id."'";
    return $de;
  }
  //個別刪除

  $db = null;
 ?>
