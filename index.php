<?php

require_once(__DIR__ . '/config/config.php');
require_once(__DIR__ . '/config/dbconnect.php');

if (isset($_SESSION['id'])) {
  $users = $db->prepare('SELECT * FROM users WHERE id=?');
  $users->execute(array($_SESSION['id']));
  $user = $users->fetch();

  // 後に選択した日付を代入できるようにする
  $date = date('Y-m-d');
  if ($_POST) {
    $date = $_POST['date'];
  }
  $post = $db->prepare('SELECT * FROM posts WHERE user_id=? AND ate_date=?');
  $post->execute(array(
    $user['id'],
    $date
  ));
  $posts = $post->fetchAll();
} else {
  header('Location: top_page.php');
  exit();
}

if ($date === date('Y-m-d')) {
  $selectDate = '本日';
} else {
  // 後に選択した日付を〇/〇の形で代入
  $selectDate = date('m/d',strtotime($date));
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
        <ul class="nav">
          <li>
            <a href=""><?= mb_substr($user['name'], 0, 10);?></a>
            <ul>
              <li><a href="users/logout.php">ログアウト</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="contents">
        <div class="contents-main">
          <form action="" method="post" class="date">
            <input type="date" name="date" value="<?= $date;?>">
            <input type="submit" value="日付を選択" class="submit">
          </form>
          <h2 class="title"><?= $selectDate;?>の摂取カロリー</h2>
          <p class="total"><?= number_format(array_sum(array_column($posts, 'calorie'))); ?> kcal</p>
        </div>

        <div class="contents-list">
          <h2 class="title"><食べたものリスト>
            <a href="contents/new.php">新しく追加する</a>
          </h2>
          <div class="table">
            <table border="1">
              <tr>
                <th>名前</th>
                <th>エネルギー</th>
                <th>たんぱく質</th>
                <th>脂質</th>
                <th>炭水化物</th>
                <th>塩分相当量</th>
                <th></th>
                <th></th>
              </tr>
              <?php foreach ($posts as $post): ?>
                <tr>
                  <td><p class="name"><?= mb_substr($post['name'], 0 , 20);?></p></td>
                  <td class="value"><?= number_format($post['calorie']);?> kcal</td>
                  <td class="value"><?= number_format($post['protein'], 1);?> g</td>
                  <td class="value"><?= number_format($post['lipid'], 1);?> g</td>
                  <td class="value"><?= number_format($post['carbohydrate'], 1);?> g</td>
                  <td class="value"><?= number_format($post['salt'], 1);?> g</td>
                  <td class="edit"><a href="contents/edit.php?id=<?= $post['id']; ?>" class="edit">編集</a></td>
                  <td class="delete"><a href="contents/delete.php?id=<?= $post['id']; ?>" class="delete">削除</a></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>

        <div class="contents-each">
          <h2 class="contents-each-title"><各合計></h2>
          <div class="contents-each-box">
            <div class="content">
              <h2 class="content-title"><たんぱく質></h2>
              <p class="content-total"><?= number_format(array_sum(array_column($posts, 'protein')), 1); ?> g</p>
            </div>
            <div class="content">
              <h2 class="content-title"><脂質></h2>
              <p class="content-total"><?= number_format(array_sum(array_column($posts, 'lipid')), 1); ?> g</p>
            </div>
            <div class="content">
              <h2 class="content-title"><炭水化物></h2>
              <p class="content-total"><?= number_format(array_sum(array_column($posts, 'carbohydrate')), 1); ?> g</p>
            </div>
            <div class="content">
              <h2 class="content-title"><食塩相当量></h2>
              <p class="content-total"><?= number_format(array_sum(array_column($posts, 'salt')), 1); ?> g</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
