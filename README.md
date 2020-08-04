# 食事管理アプリ（仮
https://meal-management-app.herokuapp.com
# 概要
このアプリは日々の摂取カロリーやたんぱく質の量など気にしている方のためのwebサイトです。  
ダイエット、糖質制限をしている方など健康志向の方におすすめです！
# 機能
その日に食べた物のカロリー、脂質など細かく保存することが出来ます。   
そして、各項目の合計も一覧ページで一目で分かります。
<img width="1437" alt="食事管理アプリ-index1" src="https://user-images.githubusercontent.com/61175442/89306567-029fcc00-d6ab-11ea-9e95-1e6d46e45908.png">



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
