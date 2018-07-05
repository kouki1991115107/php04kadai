<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["u_name"]) || $_POST["u_name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$u_name = $_POST["u_name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];




// //2. DB接続します(エラー処理追加)
try {
  //ここからPDO使いますよ の文
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


// //３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, u_name, lid, lpw, kanri_flg, life_flg) VALUES(NULL, :b1, :b2, :b3, 0, 0)");
$stmt->bindValue(':b1', $u_name,  PDO::PARAM_STR);
$stmt->bindValue(':b2', $lid,    PDO::PARAM_STR);
$stmt->bindValue(':b3', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

// //４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: user.php");
  exit;
}
?>