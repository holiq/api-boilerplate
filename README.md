# Laravel API Boilerplate

![Laravel Version](https://img.shields.io/badge/Laravel-11.x-red)
![PHP Version](https://img.shields.io/badge/PHP-8.2-blue)
![License](https://img.shields.io/badge/license-MIT-green)

This repository provides a boilerplate for creating RESTful APIs using Laravel 11, with a focus on clean, maintainable code. It leverages Actions, Data Transfer Objects (DTOs), and best practices to ensure a scalable architecture.

## Features

- **RESTful API**: Preconfigured routes and controllers for building APIs.
- **Actions**: Separate business logic into single-responsibility classes.
- **DTOs**: Manage data flow between layers of the application.
- **Clean Code**: Emphasis on readability, reusability, and performance.
- **Laravel 11**: Leverage the latest features and enhancements in Laravel.

## Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- Laravel 11.x
- MySQL or any other supported database

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/holiq/api-boilerplate.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd api-boilerplate
   ```

3. **Install dependencies:**

   ```bash
   composer install --prefer-dist
   ```

4. **Set up environment variables:**

   Copy the `.env.example` file to `.env` and configure your database settings.

   ```bash
   cp .env.example .env
   ```

5. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

6. **Run migrations:**

   ```bash
   php artisan migrate
   ```

### Running the API

Start the development server:

```bash
php artisan serve
```

The API will be accessible at `http://localhost:8000/api`.

## Usage

- **Routes**: Define your API routes in `routes/api.php`.
- **Controllers**: Implement your API logic using controllers located in `app/Http/Controllers`.
- **Actions**: Organize business logic in `app/Actions` and use command `make:action {name}` for generate the action.
- **DTOs**: Use Data Transfer Objects in `app/DataTransferObjects` and use command `make:dto {name}` for generate the DTOs.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any enhancements or bug fixes.
