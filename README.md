# php-helper-functions

ちょっとした関数を何度も書くのすら面倒になったのでここに集めておく。

# 使い方

```shell
name='php-helper-functions'
composer config repositories.$name \
vcs https://github.com/takuya/$name  
composer require takuya/$name:master
composer install
```

# 関数を増やすとき

```shell
touch src/helpers/Array/array_sample.php
php tests/gen_tests.php
```

# テスト
paratest が速くていい。
```shell
vendor/bin/paratest
```

