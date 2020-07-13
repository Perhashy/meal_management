<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="styles/application.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>ユーザーページ</h1>
        <a href="users/logout.php">ログアウト</a>
      </div>
      <div class="contents">
        <div class="contents-main">
          <h2 class="title">〇/〇の摂取カロリー</h2>
          <p class="total">〇〇 kcal</p>
        </div>

        <div class="contents-list">
          <h2 class="title">食べたものリスト</h2>
          
          <a href="contents/new.php">新規投稿ページ</a>
          <a href="contents/edit.php">編集ページ</a>
          <a href="contents/delete.php">削除</a>
        </div>

        <div class="contents-each">
          <h2>各合計</h2>
          <div class="content">
            <h2 class="title">たんぱく質</h2>
            <p class="total">〇〇 g</p>
          </div>
          <div class="content">
            <h2 class="title">脂質</h2>
            <p class="total">〇〇 g</p>
          </div>
          <div class="content">
            <h2 class="title">炭水化物</h2>
            <p class="total">〇〇 g</p>
          </div>
          <div class="content">
            <h2 class="title">食塩相当量</h2>
            <p class="total">〇〇 g</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
