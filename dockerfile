# PHP + Apache image
FROM php:8.2-apache

# Apache rewrite module enable करा
RUN a2enmod rewrite

# आवश्यक PHP extensions install करा
RUN docker-php-ext-install mysqli pdo pdo_mysql

# प्रोजेक्ट फोल्डर कॉपी करा
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Apache document root सेट करा (जर public folder असेल तर)
# RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

# Port expose
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
