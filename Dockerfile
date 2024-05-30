FROM wordpress:latest
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
# enable rewrite module
RUN a2enmod rewrite

RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/sites-available/000-default.conf

RUN service apache2 restart
