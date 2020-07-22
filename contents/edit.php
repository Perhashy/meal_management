<?php

require_once('../config/config.php');
require_once('../config/dbconnect.php');

if (isset($_SESSION['id'])) {
  $users = $db->prepare('SELECT * FROM users WHERE id=?');
  $users->execute(array($_SESSION['id']));
  $user = $users->fetch();

  if (isset($_REQUEST['id']) && is_numeric($_SESSION['id'])) {
    $id = $_REQUEST['id'];

    $posts = $db->prepare('SELECT * FROM posts WHERE id=?');
    $posts->execute(array($id));
    $post = $posts->fetch();
    if ($post['user_id'] !== $user['id']) {
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

if (!empty($_POST)) {
  if ($_POST['name'] !=='') {
    $post = $db->prepare('UPDATE posts SET name=?, calorie=?, protein=?, lipid=?, carbohydrate=?, salt=?, ate_date=? WHERE id=?');
    $post->execute(array(
      $_POST['name'],
      $_POST['calorie'],
      $_POST['protein'],
      $_POST['lipid'],
      $_POST['carbohydrate'],
      $_POST['salt'],
      $_POST['ate_date'],
      $_REQUEST['id']
    ));

    header('Location: ../index.php');
    exit();

  } else {
    $post = $_POST;
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
        <h1>食べたものを編集</h1>
        <form action="" method="post">
          <div class="form-title">
            <h2>名前</h2>
            <p class="must">必須</p>
            <input type="text" class="form-title-input" name="name" value="<?= $post['name'];?>">
            <?php if ($error['name'] === 'blank'): ?>
              <p class="error">※名前を入力してください</p>
            <?php endif;?>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">エネルギー：</h2>
            <input type="number" min="0" class="form-box-input" name="calorie" value="<?= $post['calorie'];?>">
            <p class="unit">kcal</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">たんぱく質：</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="protein" value="<?= $post['protein'];?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">脂質：　　　</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="lipid" value="<?= $post['lipid'];?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">炭水化物：　</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="carbohydrate" value="<?= $post['carbohydrate'];?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">塩分相当量：</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="salt" value="<?= $post['salt'];?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">日付：　　　</h2>
            <input type="date" class="form-box-input" name="ate_date" value="<?= $post['ate_date'];?>">
          </div>
          <div class="submit">
            <input type="submit" class="submit-btn" value="更新する">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
