<?php

$id = $_GET["id"];

try {
    //ここからPDO使いますよ の文
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

$sql = "SELECT * FROM gs_bm_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Mark</title>
</head>

<!-- header -->
<nav>
<div>
<a href="select.php">ブックマーク一覧</a>
</div>
</nav>
<!-- header end -->

<!-- main -->
<form method="POST" action="update.php">
<div>
<fieldset>
<legend>Book Mark</legend>
<label>Title: <input type="text" name="title" value="<?=$row["title"]?>"></label><br>
<label>URL: <input type="text" name="URL" value="<?=$row["URL"]?>"></label><br>
<label>Comment:  <textarea name="comment" cols="30" rows="10" ><?=$row["comment"]?></textarea> </label>
<input type="hidden" name="id" value="<?=$row["id"]?>">
<input type="submit" value="送信！">
</fieldset>
</div>
</form>


<body>
    
</body>
</html>


