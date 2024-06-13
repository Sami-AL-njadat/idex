# idex
idex
# dashboard-blog-idex

Dashboard Blog - Idex
Overview
Welcome to the Idex Dashboard Blog project! This is a Laravel-based application that provides a dashboard and blog functionalities.

Prerequisites
Before you begin, ensure you have met the following requirements:

PHP >= 7.3
Composer
MySQL or any other supported database
Node.js and npm (for frontend assets)
Getting Started
Follow these steps to get your development environment set up.

Clone the Repository
First, clone the repository to your local machine:

sh
Copy code
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
Install Dependencies
Use Composer to install PHP dependencies:

sh
Copy code
composer install
Configure the Environment
Copy the example environment file and generate an application key:

sh
Copy code
cp .env.example .env
php artisan key:generate
Set Up the Database
Edit the .env file to change the database name and other related settings. Look for the following lines:

env
Copy code
DB_DATABASE=laravel
Replace laravel with idexdashboard:

env
Copy code
DB_DATABASE=idexdashboard
Ensure other database settings (DB_USERNAME, DB_PASSWORD, etc.) are correct.

Run Migrations
Run the database migrations to set up your database schema:

sh
Copy code
php artisan migrate
Serve the Application
Start the development server:

sh
Copy code
php artisan serve
You can now access the application at http://localhost:8000.

Usage
After setting up, you can start developing your application. You can also run additional commands like:

php artisan migrate:rollback - Rollback the last database migration.
php artisan db:seed - Seed the database with dummy data.
Contributing
If you wish to contribute, please follow these steps:

Fork the repository.
Create a new feature branch (git checkout -b feature/YourFeature).
Commit your changes (git commit -m 'Add some feature').
Push to the branch (git push origin feature/YourFeature).
Create a new Pull Request.