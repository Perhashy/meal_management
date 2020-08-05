# 食事管理アプリ（仮
https://meal-management-app.herokuapp.com  
・テスト用アカウント  
  メールアドレス：test@gmail  
  パスワード：testtest  
※2020/8/4を選択してもらうと、仮投稿内容が確認できます。  

# 概要
このアプリは日々の摂取カロリーやたんぱく質の量など気にしている方のためのwebサイトです。  
ダイエット、糖質制限をしている方など健康志向の方におすすめです！
# 機能
その日に食べた物のカロリー、脂質など細かく保存することが出来ます。   
・各項目の合計も一覧ページで一目で分かります。
<img width="1437" alt="食事管理アプリ-index1" src="https://user-images.githubusercontent.com/61175442/89306567-029fcc00-d6ab-11ea-9e95-1e6d46e45908.png">
<img width="1434" alt="食事管理アプリ-index2" src="https://user-images.githubusercontent.com/61175442/89307033-91ace400-d6ab-11ea-96f1-38e3a765f4c1.png">  
・上部で日付を選択しすると、選択した日付の投稿内容を確認できます。
<img width="583" alt="食事管理アプリ-index3" src="https://user-images.githubusercontent.com/61175442/89307614-40e9bb00-d6ac-11ea-9913-0ff3dd837521.png">  
・投稿、編集はそれぞれ日付の指定・変更ができるため、過去の食事も投稿可能  
※エネルギーは整数のみ、それ以外は小数第１位まで入力可能  
<img width="775" alt="食事管理アプリ-create" src="https://user-images.githubusercontent.com/61175442/89307861-8a3a0a80-d6ac-11ea-9274-049f90ca1d8b.png">





# 開発環境
* PHP
* HTML
* scss
* MySQL
* VSコード
* mac  
# DB設計
## usersテーブル
|Column         |Type   |Options|
|---------------|-------|-------|
|name           |string |null: false|
|email          |string |null: false, uniqe: true|
|password       |string |null: false|
|age            |integer|null: false|
|created        |datetime|null: false|

## postsテーブル
|Column         |Type   |Options|
|---------------|-------|-------|
|name           |string |null: false|
|calorie        |integer||
|protein        |double(5,1)||
|lipid          |double(5,1)||
|carbohydrate   |double(5,1)||
|salt           |double(4,1)||
|ate_date       |date||
|user_id        |integer    |null: false,foreign_key: true|
|created        |datetime|null: false|
