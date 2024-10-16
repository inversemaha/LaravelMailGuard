
<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Overview

This project is a Laravel-based web application that includes an organization registration system. The application is built using:

- **Laravel Breeze** for lightweight authentication scaffolding.
- **Bootstrap 5** for responsive and modern UI styling.
- **Storage and File Uploads** to manage document submissions securely.
- **Session-based Flash Messages** to provide feedback to users after actions like form submissions.
- **Dynamic Email Notifications** to handle user registration and password resets.

This setup creates a robust, user-friendly application designed for quick onboarding, registration validation, and profile management.

## Features

- **User Registration and Authentication**: Powered by Laravel Breeze for minimal and customizable authentication flows.
- **Responsive UI**: Designed with Bootstrap 5 for mobile-friendly forms and layouts.
- **File Management**: Securely upload and store organizational documents using Laravel's file storage.
- **Email Verification**: Integrated email verification to ensure secure access.
- **Flash Messaging**: Provides users with instant feedback on actions like form submissions and updates.
- **Custom Routes for File Access**: Access files securely using custom routes when necessary.

## Getting Started

### Prerequisites

Ensure you have the following installed:
- PHP >= 8.0
- Composer
- Node.js and NPM

### Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-username/your-repo.git
    cd your-repo
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Configure Environment**:
   Copy the `.env.example` file to `.env` and update the necessary settings (database, mail, storage).

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Setup**:
    ```bash
    php artisan migrate
    ```

5. **Set Up Storage Link**:
   ```bash
   php artisan storage:link
   ```

### Running the Application

To serve the application, run:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` to access the application.

## Usage

### Authentication

Laravel Breeze provides out-of-the-box login, registration, password reset, and email verification features. The user interface is customized with Bootstrap 5, allowing for a clean and modern look across all authentication-related pages.

### File Uploads

This application allows users to upload various documents, such as Trade License and TIN Certificate. Files are stored in `storage/app/public` and accessible through the `/storage` directory.

### Flash Messages

Flash messages inform users of actions' success or failure, enhancing the user experience. Messages are automatically dismissed after a few seconds.

### Email Notifications

Email notifications are automatically sent to users for actions such as registration and password resets.

## Project Structure

- **`app/Models`**: Contains the Eloquent models, such as `Profile`, for managing user-related data.
- **`resources/views`**: Contains Blade templates, including `auth` views customized with Bootstrap 5 for consistency.
- **`public/storage`**: Linked directory for accessing stored files uploaded by users.

## Additional Documentation

- [Laravel Breeze Documentation](https://laravel.com/docs/starter-kits#laravel-breeze)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
- [Laravel Storage](https://laravel.com/docs/filesystem)

## Contributing

Contributions are welcome! If you'd like to contribute, please fork the repository and submit a pull request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
