#!/bin/bash
cd /var/www/html

# # Read passwords from Docker secrets
# DB_PASSWORD=$(cat /run/secrets/wp_db_password)
# ADMIN_PASSWORD=$(cat /run/secrets/wp_admin_password)

# curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
# chmod +x wp-cli.phar
# ./wp-cli.phar core download --allow-root
# ./wp-cli.phar config create --dbname=$WORDPRESS_DB_NAME --dbuser=$WORDPRESS_DB_USER --dbpass=$DB_PASSWORD --dbhost=$WORDPRESS_DB_HOST --allow-root
# ./wp-cli.phar core install --url=mknoll.42.fr --title=$WP_TITLE --admin_user=$WP_ADMIN_USER --admin_password=$ADMIN_PASSWORD --admin_email=$WP_ADMIN_EMAIL --allow-root

# php-fpm8.2 -F

#!/bin/bash
cd /var/www/html
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
./wp-cli.phar core download --allow-root
./wp-cli.phar config create --dbname=wordpress --dbuser=wpuser --dbpass=password --dbhost=mariadb --allow-root
./wp-cli.phar core install --url=mknoll.42.fr --title=Inception --admin_user=admin --admin_password=admin --admin_email=admin@admin.com --allow-root

php-fpm8.2 -F