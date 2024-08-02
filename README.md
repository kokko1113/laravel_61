# Docker Laravel Dev

このリポジトリはLaravelの開発環境をDockerで構築したものです。

phpMyAdminとMailhogが導入済みのため、それぞれブラウザからデータベースとメールを確認することが出来ます。

## 必須環境

- Docker (Docker Desktop, Docker Engine)
- Hyper-V (Windowsのみ)
- WSL2 (Windowsのみ)

※Hyper-VとWSL2はどちらか一方がセットアップされている必要があります。

## セットアップ手順

1. `git clone https://github.com/saitogo555/docker-laravel-dev.git`を実行してリポジトリをクローンする
2. `cd docker-laravel-dev`を実行してプロジェクトフォルダに移動する。
3. `docker compose up -d`を実行してコンテナを起動する。

## php

ApacheとComposerが使えるコンテナです。

初回起動時にホスト側のsrcフォルダ内が空であれば自動的に最新バージョンのLaravelプロジェクトをセットアップします。

### Laravel

`http://localhost:8080`でLaravelのサイトにアクセス出来ます。

### artisanコマンド

artisanコマンドを使用するにはphpコンテナ内で実行する必要があります。

- `docker compose exec php bash`でphpコンテナ内に入ってから任意のartisanコマンドを実行する。
- `docker compose exec php php artisan <command>`で任意のartisanコマンドを実行する。

### .envファイル

リモートリポジトリからpullしたとき、.envファイルはLaravelプロジェクトに含まれてません。

コンテナ起動時にsrcフォルダ直下に.env.local又は.env.exampleが存在する場合、それらのファイルから自動的に.envを生成します。

.env.localと.env.exampleでは.env.localの方が優先度が高いです。

そのためリモートリポジトリにpushする時は予め.env.localファイルを作成しておくことを推奨します。

また、メールの送受信はmailhogを行うため、メールの設定を自動でmailhogの設定に置き換わります。

### データベース

LaravelのデータベースのデフォルトはSQLiteになっています。

MariaDBのサービスを使用する場合は以下の設定を.envファイルに記述してください。

| Key           | Value       |
|---------------|-------------|
| DB_CONNECTION | mysql       |
| DB_HOST       | mariadb     |
| DB_PORT       | 3306        |
| DB_DATABASE   | laravel_app |
| DB_USERNAME   | root        |
| DB_PASSWORD   | root        |

## mariadb

MariaDBとは、MySQLから派生したレーショナルデータベースです

phpMyAdminからデータベースの管理を行うことが出来ます。

直接コマンドでデータベースを操作する場合は下記の手順でMariaDBにログイン出来ます。

1. `docker compose exec mariadb bash`を実行してmariadbコンテナに入る。
2. `mysql -u root -p laravel_app`を実行してパスワード入力画面に遷移する。
3. パスワード`root`を入力し、Enterを押してMariaDBにログインする。

## phpmyadmin

phpMyAdminとは、MySQLサーバをウェブブラウザで管理するためのデータベース接続クライアントツールです。

`http://localhost:8081`でデータベースの管理画面にアクセス出来ます。

## mailhog

Mailhogとは、開発者向けのメール送受信テスト用ツールです。

phpからのメール送信は全てMailhogにリダイレクトされます。

`http://localhost:8025`でメールの確認画面にアクセス出来ます。
