# E-commerce Application

An e-commerce application built with **Laravel** (backend) and **React.js** (frontend) for managing products, orders, and user authentication.

## Table of Contents

- [Project Overview](#project-overview)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
  - [Backend Setup (Laravel)](#backend-setup-laravel)
  - [Frontend Setup (React.js)](#frontend-setup-reactjs)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Running Tests](#running-tests)
- [Contributing](#contributing)
- [License](#license)

---

## Project Overview

This is a full-stack e-commerce application that allows users to view and purchase products, manage their carts, and complete transactions via a payment gateway. The backend is built with **Laravel**, while the frontend is developed using **React.js** and **TypeScript**.

- **Backend**: Laravel API with user authentication, product management, and order processing.
- **Frontend**: React.js application for dynamic product display, cart management, and checkout.
- **Payment Integration**: Stripe and PayPal integration for processing payments.
  
---

## Technologies Used

- **Backend**: 
  - Laravel 9.x (PHP)
  - MySQL or PostgreSQL for database
  - Socialite (for OAuth login with Google)
  - Laravel Sanctum (for API authentication)
  - Stripe/PayPal for payment processing

- **Frontend**: 
  - React.js (with TypeScript)
  - Redux (optional for state management)
  - React Router (for navigation)
  - Tailwind CSS (for styling)

- **Deployment**:
  - Heroku, AWS, or DigitalOcean for hosting

- **Other Tools**:
  - Git (version control)
  - Composer (PHP package manager)
  - NPM (JavaScript package manager)

---

## Installation

### Backend Setup (Laravel)

1. Clone the repository:

``bash
git clone https://github.com/yourusername/ecommerce-app.git
``

2. Navigate to the backend folder:
```bash
cd ecommerce-app
```

3. Install PHP dependencies using Composer:
```bash
composer install
```

4. Set up your environment file:
```bash
cp .env.example .env
```
Edit the .env file with your local environment settings (database, email, etc.).

5. Generate an application key:
```bash
php artisan key:generate
```

6. Run migrations to set up the database:
```bash
php artisan migrate
```

7. Optionally, run seeders to populate the database with dummy data:
```bash
php artisan db:seed
```

8. Start the Laravel server:
```bash
php artisan serve
```
Your backend will now be running at http://127.0.0.1:8000.

### Frontend Setup (React.js)

1. Navigate to the frontend directory:
```bash
cd ecommerce-frontend-app
```

2. Install JavaScript dependencies using npm:
```bash
npm install
```

3. Set up your environment variables (for API integration):

- Create a ```.env``` file in the frontend directory.
- Add the following keys:
```ini
REACT_APP_API_URL=http://127.0.0.1:8000/api
```

4. Start the React development server:
```bash
npm start
```
Your frontend will now be running at ```http://localhost:3000```.

## Configuration

1. **Set Up Mail (Optional):** If you're integrating email services for user registration or order confirmations, configure the mail driver in the ```.env``` file:
```ini
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=your_mailgun_username
MAIL_PASSWORD=your_mailgun_password
MAIL_ENCRYPTION=tls
```
2. **Payment Gateway:** Configure your Stripe or PayPal keys in the ```.env``` file for payment integration.

## Usage

- **Authentication:** Users can log in using Google OAuth through Laravel Socialite. The system supports both email/password and social login.
- **Admin Panel:** The admin can manage products, users, and orders through a basic dashboard.
- **Product Management:** Add, update, and delete products with categories, images, and descriptions.
- **Cart & Checkout:** Users can add products to their cart, proceed to checkout, and complete payments via Stripe or PayPal.

## API Documentation

### Authentication
- **POST** ```/api/login```: Login with email/password.
- **POST** ```/api/google/login```: Login with Google OAuth (using Socialite).

### Products
- **GET** ```/api/products```: Fetch all products.
- **GET** ```/api/products/{id}```: Fetch a single product by ID.

### Cart
- **GET** ```/api/cart```: Get the current user's cart.
- **POST** ```/api/cart/add```: Add a product to the cart.
- **POST** ```/api/cart/checkout:``` Proceed to checkout and pay.

## Running Tests
To run the tests for your Laravel backend, use PHPUnit:
```bash
php artisan test
```
To run frontend tests, use:
```bash
npm test
```
##License
This project is licensed under the MIT License - see the LICENSE file for details.