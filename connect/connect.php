<?php
  try {
    $username = 'root';
    $password = '12345678';
    $dbname="booklist";
    $dsn = "mysql:host=localhost;dbname=$dbname";
           $options = array(
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                 );
       $db = new PDO($dsn, $username, $password, $options);
  } catch (Exception $e) {
    echo "失敗";
  }

  Class Sql{

    //宣告post變數
    function Variables($db, $Button){//$Button存入的是新增或刪除或查詢的值

      //儲存指定變數
      $dbs = $db;//連線
      $Status = $Button;//存入狀態值
      $Id = $_POST["Id"];//Id
      // $Shelf_Number = VJ($_POST["Shelf_Number"]);//架號
      $Shelf_Number = $_POST["Shelf_Number"];//架號
      $Journal = $_POST["Journal"];//刊名
      $Classification = $_POST["Classification"];//分類號
      $Publication = $_POST["Publication"];//刊別
      $Language = $_POST["Language"];//語言
      $Budget = $_POST["Budget"];//預算科別
      $Money = $_POST["Money"];//金額
      $Source = $_POST["Source"];//來源
      date_default_timezone_set('Asia/Taipei');//設定時間為台北
      $datetime = date("Y-m-d H:i:s");//時間
      //儲存指定變數

      //$status用來判斷sumit是做新增 刪除 查詢 更新
      switch ($Status) {
        case 'Insert':
         $this->Inserts(
                        $dbs, $Shelf_Number, $Journal, $Classification, $Publication,
                        $Language, $Budget, $Money, $Source, $datetime
                      );
          break;

          case 'Update':
            $this->Updates(
              $dbs, $Id, $Shelf_Number, $Journal, $Classification,
              $Publication, $Language, $Budget, $Money, $Source, $datetime
            );
          break;

          case 'Delete':
            $this->Deletes($dbs, $Id, $Shelf_Number, $Journal);
          break;

        default:
          # code...
          break;
      }
    }
    //宣告post變數

    //新增到資料庫
    function Inserts(
                      $dbs, $Shelf_Number, $Journal, $Classification, $Publication,
                      $Language, $Budget, $Money, $Source, $datetime){

                      //htmlentities資料庫中有單引號所以轉換html格式
      $SqlInsert = "
                    INSERT INTO `booklist`(
                                          `Shelf_Number`,
                                          `Journal`,
                                          `Classification`,
                                          `Publication`,
                                          `Language`,
                                          `Budget`,
                                          `Money`,
                                          `Source`,
                                          `datetime`
                                          ) VALUES (
                                          '".$Shelf_Number."',
                                          '".htmlentities($Journal, ENT_QUOTES, "utf-8")."',
                                          '".$Classification."',
                                          '".$Publication."',
                                          '".$Language."',
                                          '".$Budget."',
                                          '".$Money."',
                                          '".$Source."',
                                          '".$datetime."'
                                          )";

      $TrueQu = $SqlQuery = $dbs->query($SqlInsert);

        if ($TrueQu) {
          echo "
          <script>
            alert('新增成功');
            document.location.href='index.php';
          </script>
          ";
        }else {
        echo "
        <script>
          alert('賣亂');
          document.location.href='index.php';
        </script>
        ";
      }
    }
    //新增到資料庫

    //查詢全部資料
    function Selects($db){
      $SeSql = "SELECT * FROM `booklist` WHERE 1";
      $SeQu = $db->query($SeSql);
      $SeDis = $SeQu->fetchAll();
      return $SeDis;
    }
    //查詢全部資料

    //刪除
    function Deletes($dbs, $Id, $Shelf_Number, $Journal){
      $DeSql = "DELETE FROM `booklist` WHERE
                                            `Id`='".$Id."' &&
                                            `Shelf_Number`='".$Shelf_Number."' &&
                                            `Journal`='".$Journal."'
                                            ";
      $DeQu = $dbs->query($DeSql);
      if ($DeQu) {
        echo "
        <script>
        alert('刪除成功');
        document.location.href='show.php';
        </script>
        ";
      }else {
        echo "
        <script>
        alert('刪除失敗');
        document.location.href='show.php';
        </script>
        ";
      }
    }
    //刪除

    //更新
    function Updates(
                      $dbs, $Id, $Shelf_Number, $Journal, $Classification,
                      $Publication, $Language, $Budget, $Money, $Source, $datetime){
      $UpSql =
      "UPDATE `booklist` SET
                          `Shelf_Number`='".$Shelf_Number."',
                          `Journal`='".htmlentities($Journal, ENT_QUOTES, "utf-8")."',
                          `Classification`='".$Classification."',`Publication`='".$Publication."',
                          `Language`='".$Language."',`Budget`='".$Budget."',
                          `Money`='".$Money."',`Source`='".$Source."',
                          `datetime`='".$datetime."' WHERE `Id`='".$Id."'";

      $UpQu = $dbs->query($UpSql);

      if ($UpQu) {
        echo "
        <script>
        alert('更新成功');
        document.location.href='show.php';
        </script>
        ";
      }else {
      echo "
      <script>
      alert('更新失敗');
      document.location.href='show.php';
      </script>
      ";
    }

    }
    //更新

    //下拉顯示日期,Group by日期有重複值只會顯示一筆
    function SeDates($db){
      $SeDate = "SELECT datetime FROM booklist GROUP BY datetime";
      $QuDate = $db->query($SeDate);
      $DisDate = $QuDate->fetchAll();
      return $DisDate;
    }
    //下拉顯示日期,Group by日期有重複值只會顯示一筆

    //以日期當條件,取得全部資料
    function Se_Date_Data($db, $datetime){
      $Select = "SELECT `Id`, `Shelf_Number`, `Journal`, `Classification`,
                        `Publication`, `Language`, `Budget`, `Money`, `Source`
                   FROM `booklist` WHERE '".$datetime."'";
      $Query = $db->query($Select);
      $Display = $Query->fetchAll();
      return $Display;
    }
    //以日期當條件,取得全部資料

  }



?>
