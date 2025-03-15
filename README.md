# Prerequisites
* NodeJS
* MySql DB

# Setting up the project

## Installing packages
Run the following commands to install the right packages
```
composer install
npm install
```

## Configuration
Duplicate the `.env.example` file and rename it to `.env`
If necessary, change the credentials of the database connection.

To generate all the tables and seed the database run the following:
```
php artisan migrate:fresh --seed
```

If this isn't working make sure your DB is live and the credentials are right.
If the database doesn't exist yet, laravel will ask you if you want to create a new one.

### Running the server
Use the following commands:
```
php artisan serve
npm run dev
```
Go to 127.0.0.1:8000 you should see the following:
![image2](https://github.com/user-attachments/assets/0d81419d-9125-4e72-a3a6-4e4d71f94ef4)



Either click the button or run the specified command: `php artisan key:generate`
Reload the page. It should be working now.
