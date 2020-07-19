<?php

require_once('../config/config.php');
require_once('../config/dbconnect.php');

$date = date('Y-m-d');

if (isset($_SESSION['id'])) {
  $users = $db->prepare('SELECT * FROM users WHERE id=?');
  $users->execute(array($_SESSION['id']));
  $user = $users->fetch();
} else {
  header('Location: ../top_page.php');
  exit();
}

if (!empty($_POST)) {
  if ($_POST['name'] !== '') {
    $post = $db->prepare('INSERT INTO posts SET user_id=?, name=?, calorie=?, protein=?, lipid=?, carbohydrate=?, salt=?, ate_date=?, created=NOW()');
    $post->execute(array(
      $user['id'],
      $_POST['name'],
      $_POST['calorie'],
      $_POST['protein'],
      $_POST['lipid'],
      $_POST['carbohydrate'],
      $_POST['salt'],
      $_POST['ate_date']
    ));

    header('Location: ../index.php');
    exit();
  } else {
    $error['name'] = 'blank';
  }
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
      <div class="form">
        <h1>食べたものを追加</h1>
        <form action="" method="post">
          <div class="form-title">
            <h2>名前</h2>
            <p class="must">必須</p>
            <input type="text" class="form-title-input" name="name">
            <?php if ($error['name'] === 'blank'): ?>
              <p class="error">※名前を入力してください</p>
            <?php endif;?>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">エネルギー：</h2>
            <input type="number" min="0" class="form-box-input" name="calorie">
            <p class="unit">kcal</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">たんぱく質：</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="protein">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">脂質：　　　</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="lipid">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">炭水化物：　</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="carbohydrate">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">塩分相当量：</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="salt">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">日付：　　　</h2>
            <input type="date" class="form-box-input" name="ate_date" value="<?= $date;?>">
          </div>
          <div class="submit">
            <input type="submit" class="submit-btn" value="追加する">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
