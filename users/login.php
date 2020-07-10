<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン</title>
    <link rel="stylesheet" href="../styles/application.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>ログイン</h1>
      </div>
      <div class="form">
        <p class="form-message">メールアドレスとパスワードを入力してログインしてください</p>
        <p class="form-message">会員登録がまだの方はこちらからどうぞ➡︎
          <a href="sign_up.php">会員登録</a>
        </p>
        <div class="form-box">
          <p class="title">・メールアドレス</p>
          <div class="input">
            <input type="text">
            <p class="error">※メールアドレスを入力してください</p>
          </div>
        </div>
        <div class="form-box">
          <p class="title">・パスワード</p>
          <div class="input">
            <input type="text">
            <p class="error">※パスワードを入力してください</p>
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
        <a href="../index.php">ログイン</a>
      </div>
    </div>
  </body>
</html>
