# Articles Web Application

This project is a Laravel-based web application that fetches and displays data from an RSS feed endpoint. It provides functionalities for searching, sorting, and pagination of the fetched articles.

## Requirements

- PHP >= 8.0.2
- Composer
- Node.js & npm

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/suchanamondal/Articles.git
    cd articles
    ```

2. **Install PHP dependencies**:
    ```bash
    composer install
    ```

3. **Install JavaScript dependencies**:
    ```bash
    npm install
    ```

4. **Set up the environment**:
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Generate an application key:
      ```bash
      php artisan key:generate
      ```

5. **Run the application**:
    ```bash
    php artisan serve
    ```

6. **Access the application**:
    Open your browser and go to `http://localhost:8000/articles`.

## Packages Used

- **Laravel Framework**: v9.52.16
- **PHP**: 8.0.2
- **Bootstrap**: 5.3.3
- **jQuery**: >=1.7
- **DataTables**: 1.11.3

## Features

- Fetches data from an external RSS feed endpoint.
- Displays articles in a table with title, description, and a link to read more.
- Provides searching, sorting, and pagination functionalities for the article table.

## Folder Structure

- **app/Http/Controllers/ArticleController.php**: Controller handling the logic for fetching and processing articles.
- **resources/views/articles/index.blade.php**: Blade template for displaying the article table.
- **resources/views/layouts/app.blade.php**: Main layout file for the application.

## Contributing

Thank you for considering contributing to this project! Please feel free to submit pull requests or issues.

