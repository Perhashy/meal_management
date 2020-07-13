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
              <td><a href="contents/edit.php">編集ページ</a></td>
              <td><a href="contents/delete.php">削除</a></td>
            </tr>
            <tr>
              <td>アーモンド 100g</td>
              <td>660</td>
              <td>18.9</td>
              <td>56.4</td>
              <td>19.1</td>
              <td>0.0</td>
              <td><a href="contents/edit.php">編集ページ</a></td>
              <td><a href="contents/delete.php">削除</a></td>
            </tr>
          </table>
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
