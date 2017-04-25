<?php
  // include 'bubble_sort.php';

  // $Language = array();// 語言
  // $LanUrl = array();// 語言網址
  // $LanId = array();// 語言id
  //
  // $Technology = array();// 科技
  // $TecUrl = array();// 科技網址
  // $TecId = array();// 科技id
  //
  // $Tour = array();// 旅遊
  // $TourUrl = array();// 旅遊網址
  // $TourId = array();// 旅遊ID
  //
  // $Other = array();// 其他
  // $OtherUrl = array();// 其他網址
  // $OtherId = array();// 其他ID

// foreach ($Display as $key => $value) {
//   $id = $value["id"];//id
//   $Types = $value["types"];//類型
//   $BookName = $value["bookname"];//收件人
//   $Url = $value["url"];//地址
//
//     switch ($Types) {
//
//       case '語言學習類':
//         array_push($LanId, $id);
//         array_push($Language, $BookName);//新的書名加在陣列後面
//         array_push($LanUrl,$Url);//新的網址加在陣列後面
//         break;
//
//       case '商業類、科技類':
//         array_push($TecId,$id);
//         array_push($Technology, $BookName);
//         array_push($TecUrl,$Url);//新的網址加在陣列後面
//         break;
//
//       case '旅遊、時尚流行類':
//         array_push($TourId, $id);
//         array_push($Tour, $BookName);
//         array_push($TourUrl,$Url);//新的網址加在陣列後面
//       break;
//
//       case '人文藝術、其它類':
//         array_push($OtherId, $id);
//         array_push($Other, $BookName);
//         array_push($OtherUrl,$Url);//新的網址加在陣列後面
//       break;
//
//       default:
//         # code...
//         break;
//     }
//   }//foreach
//
//   //各類書籍的總數
//   $LanCount = count($Language);//語言
//   $TecCount = count($Technology);//科技
//   $TourCount = count($Tour);//旅遊
//   $OtherCount = count($Other);//其他
//   //各類書籍的總數
//
//   //把書籍總數以陣列儲存,準備排序
//   $Data = array($LanCount, $TecCount, $TourCount, $OtherCount);
//  //把書籍總數以陣列儲存,準備排序
//
//  //把Data丟到compare函示去排序,desc由大到小
//  $Sort = compare($Data, 'desc');
//  //把Data丟到compare函示去排序,desc由大到小
//
//  // 顯示所有資料,當td被觸及時,可以做更新資料(action/update.php)
//   for ($i=0; $i < $Sort[0] ; $i++) {
//     echo "
//     <tr>
//       <td></td>
//       <td data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' onclick='edit(\"$LanId[$i]\",\"$Language[$i]\", \"$LanUrl[$i]\")'>
//         <a href='$LanUrl[$i]'>$Language[$i]</a>
//         </td>
//
//       <td data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' onclick='edit(\"$TecId[$i]\",\"$Technology[$i]\", \"$TecUrl[$i]\")'><a href='$TecUrl[$i]'>$Technology[$i]</a>
//       </td>
//
//       <td  data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' onclick='edit(\"$TourId[$i]\",\"$Tour[$i]\", \"$TourUrl[$i]\")'><a href='$TourUrl[$i]'>$Tour[$i]</a>
//       </td>
//
//       <td  data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' onclick='edit(\"$OtherId[$i]\",\"$Other[$i]\", \"$OtherUrl[$i]\")'><a href='$OtherUrl[$i]'>$Other[$i]</a>
//       </td>
//     </tr>
//     ";
//   }
$BackWeb = $_SERVER["PHP_SELF"];//本頁位置
//判斷更新按鈕是否存在
if (isset($_POST["Update"])) {
  //設定$Update的值=Update用於connect裡的switch
  $Update = $_POST["Update"] = "Update";
  //$Sql從action/select.php出來
  $Up = $Sql->Variables($db, $Update);

}else if(isset($_POST["Delete"])){

  $Delete = $_POST["Delete"] = "Delete";
  $De = $Sql->Variables($db, $Delete);
}


//$Dis_Date_Data在action/select.php
foreach ($Dis_Date_Data as $key => $value) {

  $Id = $value["Id"];//Id
  $Shelf_Number = $value["Shelf_Number"];//架號
  $Journal = $value["Journal"];//刊名 htmlentities資料庫中有單引號所以轉換html格式
  // str_replace($Journal) = $value["Journal"];//刊名
  $Classification = $value["Classification"];//分類號
  $Publication = $value["Publication"];//刊別
  $Language = $value["Language"];//語言
  $Budget = $value["Budget"];//預算科別
  $Money = $value["Money"];//金額
  $Source = $value["Source"];//來源

  echo "<tr onclick='Edits(
    \"$Id\", \"$Shelf_Number\", \"$Journal\", \"$Classification\", \"$Publication\",
    \"$Language\", \"$Budget\", \"$Money\", \"$Source\")'>";

  //  echo "<tr onclick='Edits(\"$Id\", \"$Shelf_Number\", \"$Journal\")'>";

  // Display($Id);
  Display("");
  Display($Shelf_Number);
  Display($Journal);
  Display($Classification);
  Display($Publication);
  Display($Language);
  Display($Budget);
  Display($Money);
  Display($Source);

  echo "</tr>";
}
//$Dis_Date_Data在action/select.php
//當tr被觸及時,以彈跳視窗顯示,可做更新刪除動作
// $vales = htmlspecialchars($value, ENT_QUOTES);


//datatable顯示
function Display($value){

  $vales = $value;

  echo "
  <td  data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>
    $vales
  </td>  
  ";
}
//datatable顯示

//html彈跳視窗
function HtmlModal(){
  echo "
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>架號:</label>
    <input type='text' name='Id' id='Id'>
    <input type='text' class='form-control' id='Shelf_Number' name='Shelf_Number'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>刊名:</label>
    <input type='text' class='form-control' id='Journal' name='Journal'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>分類號:</label>
    <input type='text' class='form-control' id='Classification' name='Classification'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>刊別:</label>
    <input type='text' class='form-control' id='Publication' name='Publication'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>語言:</label>
    <input type='text' class='form-control' id='Language' name='Language'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>預算科別:</label>
    <input type='text' class='form-control' id='Budget' name='Budget'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>金額:</label>
    <input type='text' class='form-control' id='Money' name='Money'>
  </div>
  <div class='form-group'>
    <label for='recipient-name' class='control-label'>來源:</label>
    <input type='text' class='form-control' id='Source' name='Source'>
  </div>
  ";
}
//html彈跳視窗

 ?>
 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@twbootstrap">Open modal for @twbootstrap</button>
...more buttons... -->
<script type="text/javascript">
  function Edits(Id, Shelf_Number, Journal, Classification, Publication, Language, Budget, Money, Source){
    document.getElementById("Id").value = Id;
    document.getElementById("Shelf_Number").value = Shelf_Number;
    document.getElementById("Journal").value = Journal;
    document.getElementById("Classification").value = Classification;
    document.getElementById("Publication").value = Publication;
    document.getElementById("Language").value = Language;
    document.getElementById("Budget").value = Budget;
    document.getElementById("Money").value = Money;
    document.getElementById("Source").value = Source;
  }
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">關閉</span></button>
        <h4 class="modal-title" id="exampleModalLabel">更新資料</h4>
      </div>
      <form role="form" method="post">
        <div class="modal-body">
          <?php HtmlModal(); ?>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="Update" class="btn btn-primary">送出</button>
          <button type="submit" name="Delete" class="btn btn-danger pull-left">刪除</button>
        </div>
      </form>
    </div>
  </div>
</div>
