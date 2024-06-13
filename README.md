# idex
Idex Dashboard Blog
 <!-- Replace with actual banner image URL -->

📜 Overview
Welcome to the Idex Dashboard Blog! This project is built using Laravel and provides a comprehensive dashboard and blog system.

⚙️ Prerequisites
Before you start, ensure you have the following software installed:

PHP (>= 7.3)
Composer
MySQL or another supported database
Node.js and npm
🚀 Getting Started
Follow these steps to set up your development environment:

📦 Clone the Repository
bash
Copy code
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
📥 Install Dependencies
bash
Copy code
composer install
🔧 Configure the Environment
Copy the example environment file and generate a new application key:

bash
Copy code
cp .env.example .env
php artisan key:generate
🛠️ Set Up the Database
Edit the .env file to update the database settings:

Open .env in your text editor.

Update DB_DATABASE from laravel to idexdashboard:

env
Copy code
DB_DATABASE=idexdashboard
Ensure other database settings (DB_USERNAME, DB_PASSWORD, etc.) are correct.

🗄️ Run Migrations
bash
Copy code
php artisan migrate
🌐 Serve the Application
bash
Copy code
php artisan serve
Visit http://localhost:8000 in your browser to view the application.

🛠️ Usage
You can use the following Artisan commands for development:

php artisan migrate:rollback - Rollback the last database migration.
php artisan db:seed - Seed the database with dummy data.
php artisan migrate:fresh - Drop all tables and re-run all migrations.
🤝 Contributing
To contribute to this project, please follow these steps:

Fork the repository.
Create a new branch (git checkout -b feature/YourFeature).
Commit your changes (git commit -m 'Add some feature').
Push to the branch (git push origin feature/YourFeature).
Open a Pull Request.
📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

📞 Contact
If you have any questions or feedback, feel free to reach out to us:

Email: your-email@example.com
GitHub Issues: Open an issue
