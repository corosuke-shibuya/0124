<?php
require_once('funcs.php');
$pdo = db_conn();
session_start();
loginCheck(); // まずログインチェック（ここで弾く）

// 管理者じゃない人がアクセスしたら強制終了させる
if ($_SESSION['kanri_flg'] != 1) {
    exit('権限がありません');
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
}



$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>編集</title>
</head>
<body>
  <h1>編集</h1>

  <form action="update_act.php" method="post">
    名前：<input type="text" name="name" value="<?= h($row['name']) ?>"><br>
    URL：<input type="text" name="url" value="<?= h($row['url']) ?>"><br>
    コメント：<textarea name="comment" rows="4" cols="40"><?= h($row['comment']) ?></textarea><br>

    <input type="hidden" name="id" value="<?= h($row['id']) ?>">
    <button type="submit">更新</button>
  </form>

  <p><a href="select.php">一覧に戻る</a></p>
</body>
</html>