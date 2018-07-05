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
<form method="POST" action="insert.php">
<div>
<fieldset>
<legend>Book Mark</legend>
<label>Title: <input type="text" name="title"></label><br>
<label>URL: <input type="text" name="URL"></label><br>
<label>Comment:  <textarea name="comment" cols="30" rows="10"></textarea> </label>
<input type="submit" value="送信！">
</fieldset>
</div>
</form>


<body>
    
</body>
</html>