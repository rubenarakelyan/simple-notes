#!/bin/bash

SECURE_MYSQL=$(expect -c "

set timeout 10
spawn mysql_secure_installation

expect \"Enter current password for root (enter for none):\"
send \"\r\"

expect \"Change the root password?\"
send \"y\r\"

expect \"New password:\"
send \"root\r\"

expect \"Re-enter new password:\"
send \"root\r\"

expect \"Remove anonymous users?\"
send \"y\r\"

expect \"Disallow root login remotely?\"
send \"y\r\"

expect \"Remove test database and access to it?\"
send \"y\r\"

expect \"Reload privilege tables now?\"
send \"y\r\"

expect eof
")

echo "$SECURE_MYSQL"

SET_MYSQL_PASSWORD=$(expect -c "

set timeout 10
spawn mysql_config_editor set --login-path=local --host=localhost --user=root --password

expect \"Enter password: \"
send \"root\r\"

expect eof
")

echo "$SET_MYSQL_PASSWORD"