# API Online Learning Platform with Laravel 8
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to Setup a Laravel Project You Cloned from Github.com

Tools Requirement
```markdown
PHP v7.4.19

Laragon or XAMPP

Postman
```

1. Clone GitHub repo for this project locally
```markdown

git clone https://github.com/risdatamamal/online-learning-platform.git online-learning-platform

```

2. After Clone Github repo, cd into your project. And then Install Composer Dependencies and NPM Dependencies
```markdown
composer install

composer update
```

3. Create a copy of your .env file
```markdown

cp .env.example .env

```

4. Generate an app encryption key
```markdown

php artisan key:generate

```

5. Create an empty database SQL for our application in MYSQL or PostgresSQL or anything about SQL

6. In the .env file, add database information to allow Laravel to connect to the database
```css
In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.
```
7. Migrate the database
```markdown

php artisan migrate

```

# How to Access Endpoint
*note admin with roles = ADMIN in table users

## ADMIN

Create Data Course from Admin
```css
POST: http://online-learning-platform.test/api/admin/course

```

Get Data list Course from Admin
```css
GET: http://online-learning-platform.test/api/admin/course

```

Edit Data Course from Admin
```css
GET: http://online-learning-platform.test/api/admin/course/{id}

```

Update Data Course from Admin
```css
PUT: http://online-learning-platform.test/api/admin/course/{id}

```

Delete Data Course from Admin
```css
DELETE: http://online-learning-platform.test/api/admin/course/{id}

```

Delete User from Admin
```css
DELETE: http://online-learning-platform.test/api/admin/user/{id}

```

Get Dashboard Statistic
```css
GET: http://online-learning-platform.test/api/admin/dashboard

```

## USER

Register
```css
POST: http://online-learning-platform.test/api/register

```

Login
```css
POST: http://online-learning-platform.test/api/login

```

Logout
```css
POST: http://online-learning-platform.test/api/logout

```

Get Data list Course byCategory
```css
GET: http://online-learning-platform.test/api/course?category={new,popular}

```

Get Data list Popular Category Course
```css
GET: http://online-learning-platform.test/api/course?category=popular

```

Get Data list Course
```css
GET: http://online-learning-platform.test/api/course

```

Get Data Detail Course byID
```css
GET: http://online-learning-platform.test/api/course?id={id}

```

Get Data search Course byName
```css
GET: http://online-learning-platform.test/api/search/course?name={name}

```

Get Data list Course byPrice Lowest
```css
GET: http://online-learning-platform.test/api/sort/lowestprice/course

```

Get Data list Course byPrice Highest
```css
GET: http://online-learning-platform.test/api/sort/highestprice/course

```

Get Data list Course byPrice Free
```css
GET: http://online-learning-platform.test/api/sort/free/course

```
