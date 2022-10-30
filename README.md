
## Laravel Test Cases to API

A repo to study test cases in Laravel

## Running locally

Clone the project

```bash
  git clone https://github.com/gbrramos/laravel-api-test-cases
```

Entre no diretório do projeto

```bash
  cd laravel-api-test-cases
```

Create the .env file with .env.example as an example

Run the migrations

```bash
  php artisan migrate
```

Run tests

```bash
    ./vendor/bin/phpunit
```
Or
```bash
    php artisan test
```

Run server

```bash
  php artisan serve
```
or

 ```bash
  php -S localhost:8000 -t ./public
```
