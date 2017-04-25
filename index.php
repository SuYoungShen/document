<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>電子雜誌清單整理</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- 自行輸入 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!-- 自行輸入 -->

<!-- (Optional) Latest compiled and minified JavaScript translation files -->


    <!-- <script type="text/javascript" src="js/verification.js"></script> -->
    <?php
      include 'connect/connect.php';
      $Sql = new Sql();

      if (isset($_POST["Insert"])) {
        $Insert = $_POST["Insert"] = "Insert";
        //當按submit出去後,先叫出Variables function,位置在connect/connect.php
        $Dis = $Sql->Variables($db, $Insert);
        //當按submit出去後,先叫出Variables function,位置在connect/connect.php
      }
     ?>
     <!-- 防呆 -->
     <script type="text/javascript" src="js/foolproof.js"></script>
     <!-- 防呆 -->

     <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">

     </script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">

     </script>
<style media="screen">
  .error{
    color:red
  }
</style>
     <script type="text/javascript">
      
     </script>


  </head>
  <body>
    <div class="container-fluid">
      <form class="form-horizontal" role="form" method="post" id="form">
        <!-- 按送出後會執行新增指令,指令在connect/connect.php -->
        <div class="form-group">
          <h1 class="text-center">期刊整理系統</h1>
        </div>

        <!--Shelf_Number 架號-->
        <div class="form-group">
          <label for="Recipient" class="col-sm-2 control-label">架號</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Shelf_Number" id="Shelf_Number" placeholder="輸入架號">
          </div>
        </div>
        <!--Shelf_Number 架號-->

        <!-- Journal 刊名-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">刊名</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Journal" id="Journal" placeholder="輸入刊名">
          </div>
        </div>
        <!-- Journal 刊名-->

        <!-- Classification 分類號-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">分類號</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Classification" id="Classification" placeholder="輸入分類號">
          </div>
        </div>
        <!-- Classification 分類號-->

        <!-- Publication 刊別-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">刊別</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Publication" id="Publication" placeholder="輸入刊別">
          </div>
        </div>
        <!-- Publication 刊別-->

        <!-- Language 語言-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">語言</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Language" id="Language" placeholder="輸入語言">
          </div>
        </div>
        <!-- Language 語言-->

        <!-- Budget 預算科別-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">預算科別</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Budget" id="Budget" placeholder="輸入預算科別">
          </div>
        </div>
        <!-- Budget 預算科別-->

        <!-- Money 金額-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">金額</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Money" id="Money" placeholder="輸入金額">
          </div>
        </div>
        <!-- Money 金額-->

        <!-- Source 來源-->
        <div class="form-group">
          <label for="Address" class="col-sm-2 control-label">來源</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="Source" id="Source" placeholder="輸入來源">
          </div>
        </div>
        <!-- Source 金額-->

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" id="submit" name="Insert" class="btn btn-default">送出</button>
            <a href="show.php">
              <button type="button" class="btn btn-default">搜尋</button>
            </a>
            <!-- <button type="submit" name="de" class="btn btn-default">刪除資料庫全部資料</button> -->
          </div>
        </div>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
