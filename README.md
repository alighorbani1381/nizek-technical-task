
    
## Little About Project
This Project is a technical task that has a simple concept it has a one form to upload data (Excel file) and another 2 APIs to get report from the inserted data


## 🚀 How to Lunch? (Non Dockerized)

0- Install Software Dependencies

PHP Version 8.1, MySQL & Redis

Install the project dependencies with [Composer](http://getcomposer.org/).

1- Run the below command from the Terminal:

    composer install --ignore-platform-reqs

2- Copy env.example to .env & set mysql & redis connection config

3- Run Migrations To Generate DB Schema

    php artisan migrate

3- Serve Project Locally (Run Queue Worker)

    php artisan queue:work
    
    php artisan serve

## 💡 How to Use Project?
when application serve locally you can upload your data into database with below URL 

#### URL: 127.0.0.1:8000/stockPrice/upload

and for use the report API you can use the Postman Collection Exported on a postman folder into root of project

## 🧪 Automated Testing
to run automated test you can run one on below command

Run With Laravel Command

    php artisan test

or run with PHP Unit Executable File

    ./vendor/bin/phpunit

### Important Tip:
The tests witten for this app has a side effect (Real Database Call) it Truncates DataTables upload dummy data from sample Excel file and check the API Response
 
