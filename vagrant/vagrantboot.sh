#!/usr/bin/env bash

# Tell everyone that this is a non-interactive session
export DEBIAN_FRONTEND=noninteractive

# Generate locales
locale-gen en_GB.UTF-8
update-locale LANG=en_GB.UTF-8
dpkg-reconfigure locales

# Change the hosts file to route simple-notes.loc to localhost
sed -i -e 's/127.0.0.1 localhost/127.0.0.1 localhost\n127.0.0.1 simple-notes.loc/g' /etc/hosts

# Prepare extra package repositories
add-apt-repository ppa:ondrej/php -y

# Update the apt-get package list and upgrade packages as required
apt-get update
apt-get upgrade -y

# Install all required packages
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
apt-get install -y expect ntp php7.0-cli php7.0-fpm php7.0-curl php7.0-gd php7.0-mbstring php7.0-mysql php7.0-xml mysql-server-5.6 nginx git nodejs build-essential g++
npm -g install gulp
npm -g install less
npm -g install less-plugin-clean-css

# Fix www folder structure
mkdir /var/www/bootstrap/cache >/dev/null 2>&1
mkdir /var/www/public/uploads >/dev/null 2>&1
mkdir /var/www/storage >/dev/null 2>&1
mkdir /var/www/storage/app >/dev/null 2>&1
mkdir /var/www/storage/debugbar >/dev/null 2>&1
mkdir /var/www/storage/logs >/dev/null 2>&1
mkdir /var/www/storage/framework >/dev/null 2>&1
mkdir /var/www/storage/framework/cache >/dev/null 2>&1
mkdir /var/www/storage/framework/sessions >/dev/null 2>&1
mkdir /var/www/storage/framework/views >/dev/null 2>&1
rm -r /var/www/html >/dev/null 2>&1

# Turn off cgi.fix_pathinfo in PHP-FPM
sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php/7.0/fpm/php.ini

# Change PHP-FPM configuration to listen on a socket with correct permissions
sed -i -e 's/;listen.mode = 0660/listen.mode = 0660/g' /etc/php/7.0/fpm/pool.d/www.conf

# Restart PHP-FPM
service php7.0-fpm restart

# Configure MySQL
cp /etc/mysql/my.cnf /usr/share/mysql/my-default.cnf
mysql_install_db --explicit_defaults_for_timestamp
mv /home/vagrant/mysql_secure_installation.sh ~/mysql_secure_installation.sh
chmod +x ~/mysql_secure_installation.sh
~/mysql_secure_installation.sh

# Initialise the database
mysqladmin --login-path=local create simplenotes
php /var/www/artisan migrate

# Prepare the nginx configuration files
mv /home/vagrant/nginx_modsite /usr/bin/nginx_modsite
mv /home/vagrant/nginx_site_simplenotes /etc/nginx/sites-available/simplenotes
chmod +x /usr/bin/nginx_modsite

# Update Composer and install vendor and npm modules and components
cd /var/www
php composer.phar self-update
php composer.phar install
rm -r node_modules >/dev/null 2>&1
npm install --save react react-dom redux react-redux immutable
npm install --save-dev webpack babel-loader babel-preset-es2015 babel-preset-react

# Disable the default site
nginx_modsite -d default

# Enable the simplenotes site
nginx_modsite -e simplenotes

# Start nginx
service nginx start
