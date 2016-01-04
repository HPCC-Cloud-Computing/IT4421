FROM tranhuucuong91/php-for-wordpress:0.1
COPY ../../project3 /var/www/html
RUN chmod 777 /var/www/html -R
RUN sudo php5enmod mcrypt
RUN sudo service apache2 restart
