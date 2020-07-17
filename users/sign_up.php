<?php
require_once('../config/config.php');
require_once('../config/dbconnect.php');

if (!empty($_POST)) {
  if ($_POST['name'] === '') {
    $error['name'] = 'blank';
  }
  if ($_POST['email'] === '') {
    $error['email'] = 'blank';
  }
  if (strlen($_POST['password']) < 7) {
    $error['password'] = 'length';
  }
  if ($_POST['password'] === '') {
    $error['password'] = 'blank';
  }
  if ($_POST['age'] === '') {
    $error['age'] = 'blank';
  }

  if (empty($error)) {
    $user = $db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE email=?');
    $user->execute(array($_POST['email']));
    $record = $user->fetch();
    if ($record['cnt'] > 0) {
      $error['email'] = 'duplicate';
    }
  }

  if (empty($error)) {
    $_SESSION['user'] = $_POST;
    header('Location: check.php');
    exit();
  }
}

if ($_REQUEST['action'] === 'rewrite' && isset($_SESSION['user'])) {
  $_POST = $_SESSION['user'];
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
        <form action="" method="post">
          <p class="form-message">次のフォームに必要事項をご記入ください</p>
          <div class="form-box">
            <p class="title">・ニックネーム</p>
            <p class="must">必須</p>
            <div class="input">
              <input type="text" name="name" value="<?= h($_POST['name']);?>">
              <?php if ($error['name'] === 'blank'): ?>
                <p class="error">※ニックネームを入力してください</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-box">
            <p class="title">・メールアドレス</p>
            <p class="must">必須</p>
            <div class="input">
              <input type="text" name="email" value="<?= h($_POST['email']);?>">
              <?php if ($error['email'] === 'blank'): ?>
                <p class="error">※メールアドレスを入力してください</p>
              <?php endif; ?>
              <?php if ($error['email'] === 'duplicate'): ?>
                <p class="error">※指定されたメールアドレスは、既に登録されています</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-box">
            <p class="title">・パスワード</p>
            <p class="must">必須</p>
            <div class="input">
              <input type="password" name="password" value="<?= h($_POST['password']);?>">
              <?php if ($error['password'] === 'blank'): ?>
                <p class="error">※パスワードを入力してください</p>
              <?php elseif ($error['password'] === 'length'): ?>
                <p class="error">※パスワードは7文字以上で入力してください</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-box">
            <p class="title">・年齢</p>
            <p class="must">必須</p>
            <div class="input">
              <select name="age">
                <option value="<?= h($_POST['age']);?>"><?= h($_POST['age']);?></option>
                <?php for ($i = 0; $i <= 100; $i++):?>
                  <option value="<?php print($i)?>"><?php print($i)?></option>
                <?php endfor; ?>
              </select>
              <?php if ($error['age'] === 'blank'): ?>
                <p class="error">※年齢を選択してください</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="submit">
            <input type="submit" class="submit-btn" value="入力内容を確認">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
