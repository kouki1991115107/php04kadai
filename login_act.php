<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

try {
    //ここからPDO使いますよ の文
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());  
}

$sql = "SELECT * FROM gs_user_table WHERE lid=:a1 AND lpw=:a2";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('a1',$lid);
$stmt->bindValue('a2',$lpw);
$res = $stmt->execute();


if($res==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $val = $stmt->fetch();
}

echo($val["kanri_flg"]);

if( $val["id"] != "" && $val["kanri_flg"] == 0){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $val["u_name"];
    header("Location: select.php");
}elseif($val["id"] != "" && $val["kanri_flg"] == 1){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $val["u_name"];
    header("Location: kanri_select.php");
}else{
    header("Location: login.php");
}

exit();
?>