# Burger App

This application is a web api based application built on <a href="https://laravel.com/docs/8.x">Laravel 8</a> and <a href="https://vuejs.org/">Vue 3</a>. To run this project on your local

## Setup using Docker

make sure Docker is installed and running in your machine

```sh
cd backend_api
touch .env
```

##### copy the syntex of .env.example

###### Set the credentials in your .env file for Database and Mail Service

---

> Note: `DB_HOST=container name of db service` is required to connect with Docker db.

---

After performing the Above Steps open the terminal in project root directory and run the below commands

```sh
docker-compose up --build
open a new tab in the terminal and run these command
docker exec -it burger_api bash
php artisan migrate
php artisan db:seed
service cron start
```

> Your App is up and running at http://localhost:81
