<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../config/dbconnect.php');

if (isset($_SESSION['id'])) {
  $users = $db->prepare('SELECT * FROM users WHERE id=?');
  $users->execute(array($_SESSION['id']));
  $user = $users->fetch();

  if (isset($_REQUEST['id']) && is_numeric($_SESSION['id'])) {
    $id = $_REQUEST['id'];

    $posts = $db->prepare('SELECT * FROM posts WHERE id=?');
    $posts->execute(array($id));
    $post = $posts->fetch();
    if ($post['user_id'] === $user['id']) {
      $post = $db->prepare('DELETE FROM posts WHERE id=?');
      $post->execute(array($id));
    } else {
      header('Location: ../index.php');
      exit();
    }
  } else {
    header('Location: ../index.php');
      exit();
  }
} else {
  header('Location: ../top_page.php');
  exit();
}

?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>食事管理アプリ（仮</title>
    <link rel="stylesheet" href="../styles/application.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>食事管理アプリ（仮</h1>
      </div>
      <div class="padding"></div>
      <div class="message">
        <h1>投稿を削除しました</h1>
        <div class="submit">
          <a href="../index.php" class="submit-btn">ホームへ</a>
        </div>
      </div>
    </div>
  </body>
</html>
