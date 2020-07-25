<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../config/dbconnect.php');

if ($_COOKIE['email'] !== '') {
  $email =$_COOKIE['email'];
}

if (!empty($_POST)) {
  $email = $_POST['email'];
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

      if ($_POST['save'] === 'on') {
        setcookie('email', $_POST['email'], time() + 60 * 60 * 24 * 14);
      }

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
      <div class="padding"></div>
      <div class="form">
        <form action="" method="post">
          <p class="form-message">メールアドレスとパスワードを入力してログインしてください</p>
          <p class="form-message">ユーザー登録がまだの方はこちらからどうぞ➡︎
            <a href="sign_up.php">ユーザー登録</a>
          </p>
          <div class="form-box">
            <p class="title">・メールアドレス</p>
            <div class="input">
              <input type="text" name="email" value="<?= h($email);?>">
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
                <input type="checkbox" name="save" value="on">
                次回から自動的にログインする
              </label>
            </div>
          </div>
          <div class="submit">
            <input type="submit" class="submit-btn" value="ログイン">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
