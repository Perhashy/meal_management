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
            <input type="number" min="0" class="form-box-input" name="calorie" value="<?= $_POST['calorie']?>">
            <p class="unit">kcal</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">たんぱく質：</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="protein" value="<?= $_POST['protein']?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">脂質：　　　</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="lipid" value="<?= $_POST['lipid']?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">炭水化物：　</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="carbohydrate" value="<?= $_POST['carbohydrate']?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">塩分相当量：</h2>
            <input type="number" min="0" step="0.1" class="form-box-input" name="salt" value="<?= $_POST['salt']?>">
            <p class="unit">g</p>
          </div>
          <div class="form-box">
            <h2 class="form-box-label">日付：　　　</h2>
            <input type="date" class="form-box-input" name="ate_date" value="<?= $date;?>">
          </div>
          <div class="submit">
            <input type="submit" class="submit-btn" value="変更する">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
