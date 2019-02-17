# Laravel 5.6 Auth + CRUD

This is a basic authentication system made with laravel 5.6 to help you jumpstart your laravel project.

What it includes:

- CRUD system for your posts (or whatever you want to use it for)

- Pagination(set to 10 posts per page but you can change that to whatever fits your needs on PostController.php)

- Flash messaging (to let you know when a post is created,updated etc..)

- Error reporting (when creating on updating posts)

In this project are included two very useful packages:

- Debugbar (to help you understand you queries better and optimize them if needed)

- Decomposer (this package shows you what package you have installed in you system along with very useful system information like the laravel version you are using,you php version,your server,if you have installed SSL and much more..)

If you decide that you don't need these packages you call always remove them via composer like this:

`composer remove "the name of the package"` (without the quotes)

Usage:

this project uses mysql

- `composer install` - to install all the dependencies

- in  this repository the .env file is not hidden from the gitignore file just to make everything easy for you to get up and running.If you plan to have this project on a production server it is recommended to change the application key.To do so run `php artisan key:generate` command and laravel will generate a key for you.Also to be extra careful you can change the database name on the .env file and on the db.sql file.

- create a database named 'auth_crud' (or the name you chose for your database)

- `php artisan migrate` to migrate the tables (or if for some reason that doesn't work there's also a db.sql file included on the root of this app.Just import that on phpmyadmin and you should be good to go.)

- `php artisan serve` (or just visit http://localhost/laravel5.6auth-CRUD-master/public if you are using XAMPP)

Now visit http://localhost:8000 to try the demo.

To remove the /public from url just visit https://stackoverflow.com/questions/28364496/laravel-5-remove-public-from-url.
This is just for local development as in a production server /public will be romved by default.