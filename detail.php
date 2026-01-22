<?php
session_start();  
$id = $_GET['id'];

require_once('funcs.php');

// 1. DB接続
$pdo = db_conn();
loginCheck(); //loginCheck()の呼び出し

// 2. データ取得
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 3. 表示用HTML
$view  = '<table border="1" style="border-collapse:collapse; width:100%;">';
$view .= '<tr><th>日時</th><th>名前</th><th>URL</th><th>コメント</th></tr>';

if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);  // ← ; 必須

  if ($row) {
    $view .= '<tr>';
    $view .= '<td>' . h($row['datetime']) . '</td>';
    $view .= '<td>' . h($row['name']) . '</td>';
    $view .= '<td><a href="' . h($row['url']) . '" target="_blank" rel="noopener noreferrer">' . h($row['url']) . '</a></td>';
    $view .= '<td>' . h($row['comment']) . '</td>';
    $view .= '</tr>';
  } else {
    $view .= '<tr><td colspan="4">データが見つかりません</td></tr>';
  }

  $view .= '</table>';
}

echo $view;

?>