## アルサーガさんの技術課題

[サービスurl](http://book-shop.site/)</br>
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
- ユーザーがおすすめの書店を投稿することで、新たな書店を開拓することができる。
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

## 追加機能
- ログイン後
  - コメント機能
  - レコメンド機能
  - お気に入り機能
  - お気に入り一覧機能
  - 検索機能の拡大
  - 現在地ボタン(https化できなかったのでローカルのみ)
  [![Image from Gyazo](https://i.gyazo.com/db21c51c0cada2a65fd97b254ef0b073.gif)](https://gyazo.com/db21c51c0cada2a65fd97b254ef0b073)

## ER図
[![Image from Gyazo](https://i.gyazo.com/d29b62f04b323676b36b2ceb7ced7266.png)](https://gyazo.com/d29b62f04b323676b36b2ceb7ced7266)

## インフラ構成
![名称未設定ファイル drawio](https://github.com/asakuno/laravel_crud/assets/102037623/8d730a5a-8f50-4fcf-8fed-de041b389353)

