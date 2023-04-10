FROM trafex/php-nginx:latest as dev

ENV HOME=/var/www/html
WORKDIR $HOME

USER root

COPY server/ngnix.conf /etc/nginx/conf.d/server.conf

RUN apk update && apk add \
  php81-tokenizer \
  php81-pdo \
  php81-pdo_mysql \
  php81-fileinfo \
  php81-xmlwriter \
  nodejs \
  npm

USER nobody

FROM dev as prod

USER root

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock $HOME/
COPY resources $HOME/resources
COPY package.json package-lock.json webpack.mix.js $HOME/
RUN composer install --no-scripts --no-autoloader --prefer-dist

RUN npm install --production \
  && npm install laravel-mix@latest \
  && npm run production \
  && npm cache clear --force

COPY . $HOME/

RUN composer dump-autoload --optimize

RUN mkdir $HOME/storage/logs

RUN chown -R nobody:nobody $HOME/storage \
  && chown -R nobody:nobody $HOME/bootstrap 

USER nobody

EXPOSE 8000