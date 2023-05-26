## アルサーガさんの技術課題

[サービスurl](http://ec2-35-78-98-150.ap-northeast-1.compute.amazonaws.com/)</br>
email: guest@example.com</br>
password: guest123</br>
で簡単にゲストログインしていただけます。


## PHP/Laravelのオリジナルサイト作成
PHP/Laravelで下記の要件を満たしたオリジナルサイトを作成し、GitHubにコードを上げてください。
（ローカル環境の場合は画面操作の動画キャプチャなどをReadmeに添付）


## 要件1. 必須機能
- [x] 認証機能
- [x] CRUD処理
- [x] 検索機能
- [x] フロントエンド
- [x] -デザインを整える（Bootstrap,TailWindCSSなど可）
- [x] -bladeを利用 or NuxtやNextを利用 どちらでも可

## 要件2. 下記のうちどれか1つを選択
- [x] 1. AWSを使用した本番公開
- [x] 2. 外部APIを利用した機能
- [x] 3. Dockerでの環境構築
  ※ Laravel-sail機能を用いず、自身で docker-compose.yml を作成しコンテナを構築すること
  （docker-compose.ymlをGitHubにあげること）
- [x] 4. S3を利用した画像のupload機能
- [ ] 5. CSVのインポート/ダウンロード機能

## サービス名
📚みんなの本屋さん📚

## サービス概要
みんなでおすすめやお気に入りの本屋さんを投稿して書店を盛り上げていくアプリです。

## メインのターゲットユーザー
- 電子書籍より紙の書籍の方が好きな方
- 近年少なくなっていく書店を盛り上げたい方

## ユーザーが抱える課題
- 近年、本屋さんの規模縮小や減少が止まらない。
- 本屋さんにいくのは行き慣れたところで、新規に発見しづらい。

## 解決方法
- ユーザーがおすすめの書店を投稿することで、新た書店を開拓することができる。
- また本好きのユーザー同士の交流につながる。

## 実装機能
- ログイン前
  - ユーザー新規登録機能
  - ログイン機能
  - 書店一覧表示機能
  - 書店詳細表示機能
  - マップ一覧表示機能
- ログイン後
  - 書店投稿機能
  - 書店編集機能
  - 書店削除機能
  - 写真投稿機能

## ER図
<img width="714" alt="1625467fbc468e4ea99e8e8cd663fe42" src="https://github.com/asakuno/laravel_crud/assets/102037623/5764298d-7a92-4cb5-afcf-d5441ed70891">

## インフラ構成
<img width="834" alt="ab37b44c53cc6ce08f25b84404cbabdf" src="https://github.com/asakuno/laravel_crud/assets/102037623/8c7969f4-bf7b-46bc-bbf1-fd59f85ac89b">

