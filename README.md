# student enrollement and learning Management

Welcome to the student Management! This project is built using Laravel and Filament PHP to provide an easy-to-use interface for managing students enrollement and learning.

## Installation

### Prerequisites

- PHP >= 8.1
- Composer
- Laravel >= 11.0

### Steps

1. **Clone the repository:**

   ```sh
   git clone git@github.com:yourusername/student-management.git
   cd student-management
   ```

2. **Install dependencies:**

   ```sh
   composer install
   ```

3. **Set up the environment:**

   Copy the example environment file and update the configuration:

   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

   Update your `.env` file with your database and other necessary configurations.

4. **Run migrations and seed the database (optional):**

   ```sh
   php artisan migrate
   php artisan db:seed
   ```

5. **Serve the application:**

   ```sh
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Usage

To access the Filament admin panel, navigate to `/admin` in your browser. You can manage students, teachers, and subjects through the admin panel and view the statistics on the custom dashboard page.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

##  Create Core Models and Resources
php artisan make:model name-file -m # create model and migration
php artisan make:filament-resource name-file

##   Clear Cache (To make config, cache, route, view is clear no error happen):
php artisan config:clear   # Clears the config cache
php artisan cache:clear    # Clears the application cache
php artisan route:clear    # Clears the route cache
php artisan view:clear     # Clears the compiled views

## create the model along with a migration, factory, and seeder, you can use this command:
php artisan make:model [name-file] -mfs