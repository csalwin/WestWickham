#!/bin/sh
sudo -i
apt-get update
apt-get install apache2 -y
apt-get install php5 -y
apt-get install php5-mycrypt -y
apt-get install mysql-server -y
apt-get install php5-mysql -y
rm -r /var/www
ln -sf /vagrant /var/www
service apache2 restart