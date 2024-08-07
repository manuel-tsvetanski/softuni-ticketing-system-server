Ticketing System
This project is a full-featured ticketing system built with React for the frontend and Laravel for the backend. The system allows users to manage tickets, add comments, and handle user authentication with features like avatar upload and profile management.

Table of Contents
Features
Setup Instructions
Frontend Setup
Backend Setup
Available Scripts
Project Structure
About Laravel
Contributing
License
Features
User authentication (login and registration)
Viewing, creating, updating, and deleting tickets
Adding comments to tickets with pagination support
User profile management, including avatar upload
Setup Instructions
Frontend Setup
To set up and run the React client locally, follow these steps:

Clone the repository:

bash
 
git clone https://github.com/yourusername/ticketing-system-client.git
cd ticketing-system-client
Install dependencies:

Make sure you have Node.js and npm installed. Then run:

bash
 
npm install
Set up environment variables:

Create a .env file in the root of the project and add the following environment variable:

plaintext
 
VITE_BACKEND_URL=http://localhost:8000
Replace http://localhost:8000 with the URL of your backend server if it's different.

Run the development server:

bash
 
npm run dev
This will start the development server and open the application in your default browser. The app will automatically reload if you make changes to the code.

Backend Setup
To set up and run the Laravel backend locally, follow these steps:

Clone the repository:

bash
 
git clone https://github.com/yourusername/ticketing-system-server.git
cd ticketing-system-server
Install dependencies:

Make sure you have PHP and Composer installed. Then run:

bash
 
composer install
Set up environment variables:

Copy the .env.example file to .env and configure your database and other environment settings:

bash
 
cp .env.example .env
Update the .env file with your database credentials and other necessary configurations.

Generate application key:

bash
 
php artisan key:generate
Run database migrations:

bash
 
php artisan migrate
Run the development server:

bash
 
php artisan serve
The server will start at http://localhost:8000 by default.

Available Scripts

Backend
In the project directory, you can run the following scripts:

php artisan serve: Starts the development server.
php artisan migrate: Runs database migrations.
php artisan db:seed: Seeds the database with test data.
php artisan test: Runs the test suite.
Project Structure

ticketing-system-server/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   ├── Policies/
│   ├── Providers/
│   └── Services/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── composer.lock
├── package.json
└── webpack.mix.js
About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Simple, fast routing engine
Powerful dependency injection container
Multiple back-ends for session and cache storage
Expressive, intuitive database ORM
Database agnostic schema migrations
Robust background job processing
Real-time event broadcasting
Laravel is accessible, powerful, and provides tools required for large, robust applications.

Contributing
Thank you for considering contributing to this project! The contribution guide can be found in the Laravel documentation.

License
The Laravel framework is open-sourced software licensed under the MIT license. The React client is also open-sourced software licensed under the MIT license.
