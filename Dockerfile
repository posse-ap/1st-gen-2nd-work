FROM php:7.4-fpm
RUN docker-php-ext-install pdo_mysql


# #使うDockerイメージ
# FROM mysql
# #日本語設定
# RUN apt-get update && apt-get install -y locales
# RUN sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen && locale-gen
# ENV LANG ja_JP.UTF-8