<?php
session_start();  
require_once('funcs.php');
loginCheck(); // まずログインチェック（ここで弾く）

// 管理者じゃない人がアクセスしたら強制終了させる
if ($_SESSION['kanri_flg'] != 1) {
    exit('権限がありません');
}

$id = $_GET['id'];


//1.  DB接続します
$pdo = db_conn();
loginCheck(); //loginCheck()の呼び出し

//２．データ取得SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
$result="";
$result = '<table border="1" style="border-collapse:collapse; width:100%;">';
$result .= '<tr><th>日時</th><th>名前</th><th>URL</th><th>コメント</th></tr>';

if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {
  header("Location: select.php");
  exit;
}
