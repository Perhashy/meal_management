<?php

require_once('config/config.php');
require_once('config/dbconnect.php');

if (!isset($_SESSION['id'])) {
  header('Location: top_page.php');
  exit();
}

if (!empty($_POST)) {
  if ($_POST['name'] !== '') {
    $posts = $db->prepare('INSERT INTO posts SET user_id=?, name=?, calorie=?, protein=?, lipid=?, carbohydrate=?, salt=?, ate_date=?');
    $posts->execute(array(
      $_SESSION['id'],
    ));
  }
}


?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>食事管理アプリ（仮</title>
    <link rel="stylesheet" href="styles/application.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>食事管理アプリ（仮</h1>
        <a href="users/logout.php">ログアウト</a>
      </div>
      <div class="contents">
        <div class="contents-main">
          <h2 class="title">〇/〇の摂取カロリー</h2>
          <p class="total">1,700 kcal</p>
        </div>

        <div class="contents-list">
          <h2 class="title"><食べたものリスト>
            <a href="contents/new.php">新しく追加する</a>
          </h2>
          <table border="1">
            <tr>
              <th>名前</th>
              <th>エネルギー(kcal)</th>
              <th>たんぱく質(g)</th>
              <th>脂質(g)</th>
              <th>炭水化物(g)</th>
              <th>塩分相当量(g)</th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <td>アーモンド 100g</td>
              <td>660</td>
              <td>18.9</td>
              <td>56.4</td>
              <td>19.1</td>
              <td>0.0</td>
              <td><a href="contents/edit.php" class="edit">編集</a></td>
              <td><a href="contents/delete.php" class="delete">削除</a></td>
            </tr>
            <tr>
              <td>チョコレート 100g</td>
              <td>618</td>
              <td>9.7</td>
              <td>46.1</td>
              <td>41.0</td>
              <td>0.01</td>
              <td><a href="contents/edit.php" class="edit">編集</a></td>
              <td><a href="contents/delete.php" class="delete">削除</a></td>
            </tr>
          </table>
        </div>

        <div class="contents-each">
          <h2 class="contents-each-title"><各合計></h2>
          <div class="contents-each-box">
            <div class="content">
              <h2 class="content-title"><たんぱく質></h2>
              <p class="content-total">123.4 g</p>
            </div>
            <div class="content">
              <h2 class="content-title"><脂質></h2>
              <p class="content-total">100.6 g</p>
            </div>
            <div class="content">
              <h2 class="content-title"><炭水化物></h2>
              <p class="content-total">123.4 g</p>
            </div>
            <div class="content">
              <h2 class="content-title"><食塩相当量></h2>
              <p class="content-total">34.05 g</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
