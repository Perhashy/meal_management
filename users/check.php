<?php
require_once('../config/config.php');

if (!isset($_SESSION['user'])) {
  header('Location: sign_up.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="../styles/users/users.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>ユーザー登録</h1>
      </div>
      <div class="form">
        <p class="form-message">記入した内容を確認して、「登録する」をクリックしてください</p>
        <div class="form-box">
          <p class="title">・ニックネーム</p>
          <p class="content"><?= h($_SESSION['user']['name']);?></p>
        </div>
        <div class="form-box">
          <p class="title">・メールアドレス</p>
          <p class="content"><?= h($_SESSION['user']['email']);?></p>
        </div>
        <div class="form-box">
          <p class="title">・パスワード</p>
          <p class="content">【表示されません】</p>
        </div>
        <div class="submit">
          <a href="sign_up.php?action=rewrite" class="submit-btn reedit">« 書き直す</a>
          <input type="submit" class="submit-btn" value="登録する">
        </div>
        <a href="thanks.php">完了</a>
      </div>
    </div>
  </body>
</html>
