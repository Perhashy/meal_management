<?php
require_once('../config/config.php');
require_once('../config/dbconnect.php');

if (!empty($_POST)) {
  if ($_POST['email'] === '') {
    $error['email'] = 'blank';
  }
  if ($_POST['password'] === '') {
    $error['password'] = 'blank';
  }
  if ($_POST['email'] !== '' && $_POST['password'] !== '') {
    $login = $db->prepare('SELECT * FROM users WHERE email=? AND password=?');
    $login->execute(array(
      $_POST['email'],
      sha1($_POST['password'])
    ));
    $user = $login->fetch();

    if ($user) {
      $_SESSION['id'] = $user['id'];
      $_SESSION['time'] = time();
      header('Location: ../index.php');
      exit();
    } else {
      $error['login'] = 'failed';
    }
  } elseif ($_POST['email'] === '') {
    $error['email'] = 'blank';
  } elseif ($_POST['password'] === '') {
    $error['password'] = 'blank';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン</title>
    <link rel="stylesheet" href="../styles/users/users.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>ログイン</h1>
      </div>
      <div class="form">
        <form action="" method="post">
          <p class="form-message">メールアドレスとパスワードを入力してログインしてください</p>
          <p class="form-message">ユーザー登録がまだの方はこちらからどうぞ➡︎
            <a href="sign_up.php">ユーザー登録</a>
          </p>
          <div class="form-box">
            <p class="title">・メールアドレス</p>
            <div class="input">
              <input type="text" name="email" value="<?= h($_POST['email']);?>">
              <?php if ($error['email'] === 'blank'): ?>
                <p class="error">※メールアドレスを入力してください</p>
              <?php endif; ?>
              <?php if ($error['login'] === 'failed'): ?>
                <p class="error">※ログインに失敗しました。正しくご記入してください</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-box">
            <p class="title">・パスワード</p>
            <div class="input">
              <input type="password" name="password" value="<?= h($_POST['password']);?>">
              <?php if ($error['password'] === 'blank'): ?>
                <p class="error">※パスワードを入力してください</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-box">
            <p class="title">・ログイン情報の記録</p>
            <div class="checkbox">
              <label class="checkbox-message">
                <input type="checkbox">
                次回から自動的にログインする
              </label>
            </div>
          </div>
          <div class="submit">
            <input type="submit" class="submit-btn" value="ログイン">
          </div>
        </form>
        <a href="../index.php">ログイン</a>
      </div>
    </div>
  </body>
</html>
