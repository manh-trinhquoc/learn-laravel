# matterhorn.vn
- chạy lệnh:  composer install --no-dev

cd /var/www/html
cd ./wp-content/plugins/unit-tested-plugin
./bin/install-wp-tests.sh  db_test_theme root example db
./bin/install-wp-tests.sh "db_test_theme" "root" ""
./vendor/bin/phpunit --testsuite Grumphp
mysql -u root -p   example
cd /var/www/html/wp-content/themes/sunshine