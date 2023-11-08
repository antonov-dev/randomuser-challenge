# Randomuser Challenge

## Assignment Description

You are free to use any libraries, frameworks, and tools to accomplish your goal. You
are welcome to consult online resources and documentation.

The application should be built using PHP.

Your goal is to create an application with as much functionality as possible in a short
time period.

### Please take no more than 3 hours to build out as much as you can of the following:

- Create a new repository on GitHub
- Connect to the ‘random user data’ api (https://randomuser.me/api/) and make 10
requests. No API key is required.
  - Please note: if the above API is down for any reason, use the ‘random activities’ api instead https://www.boredapi.com/api/activity. Sort responses by the ‘type’ key.
  - Extract each user’s full name, phone, email and country 
- Take the batch of API responses and sort them by reverse alphabetical order, according  to last name.
- Convert the sorted, batched data into a valid XML response. The XML response may follow any convention of your choosing.
- Make the above XML response available via an API route/endpoint that you create.
- Commit and push changes to GitHub
- Write a phpunit test
- Add validation and error responses

### If you have time remaining, here are some suggested bonus ideas, or make up your own:
- Make your API take a limit as a parameter.
- Dockerize your application

## Installation

1. Clone repo
2. Run `cd randomuser-challenge`
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

