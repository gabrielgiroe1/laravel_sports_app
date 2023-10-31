FROM node:14 as node

WORKDIR /app
RUN npm install -g create-vite


FROM php:8.2.11 as php


RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev

WORKDIR /var/www

COPY . .
COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer
ENV PORT=8888



COPY --from=node /usr/local/bin/node /usr/local/bin/
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules

RUN apt-get update -y
RUN apt-get install -y nodejs npm

RUN npm install


ENTRYPOINT [ "./Docker/entrypoint.sh" ]




