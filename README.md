# Simple blog with comments on Laravel 7

I've used [this tutorial](https://www.codechief.org/article/create-your-own-multilevel-nested-comments-system-in-laravel#gsc.tab=0) and made some improvements:

- better project structure, frontend and backend
- deleting posts with related comments
- comments list with delete option
- date and time now are using as slug
- simple comment validation with request-class
- factory for posts table
- page 404

## How to use

As usual, configure your database settings in .env, then `<php artisan migrate --seed>`. Admin page available at (/admin), default user: 'admin@example.com', password - '1234'.