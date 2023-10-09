# Randomuser Challenge

## Installation

1. Clone repo
2. Run `cd envion-challenge`
3. Copy `.env.example` to `.env`
4. Run `docker run --rm \
   -u "$(id -u):$(id -g)" \
   -v "$(pwd):/var/www/html" \
   -w /var/www/html \
   laravelsail/php82-composer:latest \
   composer install --ignore-platform-reqs`
5. Run `./vendor/bin/sail up -d`
6. Run `./vendor/bin/sail artisan key:generate`
7. Visit http://localhost

## Running tests

1. Run ` ./vendor/bin/sail artisan test`

