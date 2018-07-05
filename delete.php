<?php

$id = $_GET["id"];

try {
    //ここからPDO使いますよ の文
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

//３．データ登録SQL作成
$sql = 'DELETE FROM gs_bm_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id,      PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header("Location: select.php");
}
?>

