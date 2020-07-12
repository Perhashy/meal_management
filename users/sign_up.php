<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会員登録</title>
    <link rel="stylesheet" href="../styles/users/users.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="header">
        <h1>会員登録</h1>
      </div>
      <div class="form">
        <p class="form-message">次のフォームに必要事項をご記入ください</p>
        <div class="form-box">
          <p class="title">・ニックネーム</p>
          <p class="must">必須</p>
          <div class="input">
            <input type="text">
            <p class="error">※ニックネームを入力してください</p>
          </div>
        </div>
        <div class="form-box">
          <p class="title">・メールアドレス</p>
          <p class="must">必須</p>
          <div class="input">
            <input type="text">
            <p class="error">※メールアドレスを入力してください</p>
          </div>
        </div>
        <div class="form-box">
          <p class="title">・パスワード</p>
          <p class="must">必須</p>
          <div class="input">
            <input type="text">
            <p class="error">※パスワードを入力してください</p>
          </div>
        </div>
        <div class="submit">
          <input type="submit" class="submit-btn" value="入力内容を確認">
        </div>
        <a href="check.php">確認ページ</a>
      </div>
    </div>
  </body>
</html>
