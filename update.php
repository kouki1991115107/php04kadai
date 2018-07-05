<?php

$id      = $_POST["id"];
$title   = $_POST["title"];
$URL     = $_POST["URL"];
$comment = $_POST["comment"];

try {
    //ここからPDO使いますよ の文
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

//３．データ登録SQL作成
$sql = 'UPDATE gs_bm_table SET title=:title, URL=:URL, comment=:comment WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title,   PDO::PARAM_STR);
$stmt->bindValue(':URL', $URL,     PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id,      PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header("Location: select.php");
}
?>


