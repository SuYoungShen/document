<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登入</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <form class="form-horizontal" role="form" action="action/insert.php" method="post">
      <!--Recipient收件人-->
      <div class="form-group">
        <label for="Recipient" class="col-sm-2 control-label">帳號</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="Account" id="Account" placeholder="輸入帳號">
        </div>
      </div>
      <!--Recipient收件人-->
      <!-- Address 地址-->
      <div class="form-group">
        <label for="Address" class="col-sm-2 control-label">密碼</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="Password" id="Password" placeholder="輸入密碼">
        </div>
      </div>
      <!-- Address 地址-->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" id="login" class="btn btn-default">登入</button>
          <!-- <button type="submit" name="de" class="btn btn-default">刪除資料庫全部資料</button> -->
        </div>
      </div>
    </form>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
