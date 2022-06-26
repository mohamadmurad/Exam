#Exam 

##installation

* clone project
* open command line and type
```
composer install
```
* Copy env file 
```
cp .env.example .env
```
* Generate Key
```
php artisan key:generate
```
* setup database connection DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD and run 
```
php artisan migrate:fresh --seed
```
* run project
```angular2html
php artisan serve 
```

##Users Account

* Admin 
```
email : admin@admin.com
password : password
```
* Student
```
email : student1@admin.com
password : password
```
