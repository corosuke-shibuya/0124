<?php
session_start();     
require_once('funcs.php');
loginCheck();   // ← データ一覧はログイン必須

// DB接続
$pdo = db_conn();

// データ取得
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

// 表示用
$view = '';
$view .= '<table border="1" style="border-collapse:collapse; width:100%;">';
$view .= '<tr><th>日時</th><th>名前</th><th>URL</th><th>コメント</th><th>詳細</th><th>削除</th><th>編集</th></tr>';

if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $view .= '<tr>';
  $view .= '<td>' . h($result['datetime']) . '</td>';
  $view .= '<td><a href="detail.php?id=' . h($result['id']) . '">' . h($result['name']) . '</a></td>';
  $view .= '<td><a href="' . h($result['url']) . '" target="_blank" rel="noopener noreferrer">' . h($result['url']) . '</a></td>';
  $view .= '<td>' . h($result['comment']) . '</td>';
  $view .= '<td><a href="detail.php?id=' . h($result['id']) . '">詳細</a></td>';
$view .= '<td>';
if ((int)$_SESSION['kanri_flg'] === 1) {
  $view .= '<a href="delete.php?id=' . h($result['id']) . '">削除</a>';
}
$view .= '</td>';

$view .= '<td>';
if ((int)$_SESSION['kanri_flg'] === 1) {
  $view .= '<a href="update.php?id=' . h($result['id']) . '">編集</a>';
}
$view .= '</td>';
  $view .= '</tr>';
}
}

$view .= '</table>';
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク一覧</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- 装飾要素 -->
    <div class="decoration"></div>

    <!-- ヘッダー -->
    <header class="header">
        <div class="nav-container">
            <a href="index.php" class="nav-link">
                <i class="fas fa-chart-bar"></i>
                 データ登録
            </a>
            <a href="logout.php" class="nav-link">
                <i class="fas fa-plus"></i>
               　ログアウト
            </a>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="main-container">
        <div class="content-card">
            <h1 class="page-title">ブックマーク一覧</h1>
            <p class="page-subtitle">保存したブックマーク</p>
            
            <div class="data-container">
                <?php if(empty( $view )): ?>
                    <!-- もし $view データがない場合の表示 -->
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <p>まだデータがありません</p>
                        <p style="margin-top: 0.5rem; font-size: 0.9rem; color: #999;">
                            最初のブックマークを登録してみましょう！
                        </p>
                    </div>
                <?php else: ?>
                    <!-- もし $view データが存在する場合 -->
                    <?=  $view ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

</html>