# Student Backend

## About Project

This project is take home test from Quinos Pos.
This is a simple backend CRUD using laravel framework.

## Requirement Tools
- Laravel v10.0
- php v8.1
- Docker

## How to run on local server

This project using Docker to running the service. To run in local, please run this command.

- docker-compose build app

- docker-compose up -d

To check the running services, simple using this command

- docker-compose ps

- docker-compose exec app rm -rf vendor composer.lock

- docker-compose exec app composer install

- docker-compose exec app php artisan key:generate

## To test on Postman

**Store**
- POST > http://localhost:8000/api/student
**Get all list**
- GET > http://localhost:8000/api/students
**Update**
- PUT > http://localhost:8000/api/student/{$uuid}
**Delete**
- Delete > http://localhost:8000/api/student/{$uuid}



## To shutdown the service

- docker-compose down


