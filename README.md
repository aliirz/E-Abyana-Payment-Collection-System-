<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://scontent.fpew1-1.fna.fbcdn.net/v/t39.30808-6/251300769_192087146429092_2084777879073837170_n.jpg?_nc_cat=1&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=D94o4ZQ-BQwQ7kNvgEvvEUS&_nc_oc=AdgrG8LhxG8UivVN4iGuodcUgCOkR097NnrDySfa39DqTrFkJzvBecD9kEOfQtCSVgxA75rowoEHs1gRHVL2DSEp&_nc_zt=23&_nc_ht=scontent.fpew1-1.fna&_nc_gid=A3KbJOz0d98sUcjGydhFq3s&oh=00_AYAOeOvRY0ro7j9eQ1QAVbhVTKhnTGntAxHm3aMXifcGdQ&oe=67C35FC5" width="140" height="140" alt="Laravel Logo"></a></p>

<p align="center">
<span><strong>E-Abyana | Water Billing Management System</strong></span>
</p>

## About E-Abyana

E-Abyana is a web-based Water Billing Management System designed to automate and digitize the billing process for the Irrigation Department. Developed using Laravel 10.x, JavaScript, and Bootstrap, this system streamlines the entire workflow, from land survey and assessment to bill generation.

##  Key Features
✅ Automated Billing Process – Eliminates manual errors and ensures accurate calculations.<br>
✅ Land Survey & Assessment – Digitally records land data for fair and transparent billing.<br>
✅ Bill Generation – Generates invoices and enables smooth bill distribution.<br>
✅ Record-Keeping & Tracking – Maintains detailed records of billing history and payments.<br>
✅ Secure & Scalable – Ensures data security while allowing future scalability.<br>

## Benefits
🔹 Transparency: Provides a clear and auditable billing process.<br>
🔹 Error Reduction: Minimizes human errors in billing calculations and record management.<br>
🔹 Efficient Record-Keeping: Centralized storage for easy access and retrieval of billing data.<br>
🔹 Time-Saving: Reduces the time required for billing and administrative tasks.<br>

E-Abyana is a step towards modernizing the irrigation billing system, bringing efficiency, accuracy, and reliability to the process.

# E-Abyana Payment Collection System

## Docker Setup Instructions

This project is dockerized for easy setup and development. Follow these steps to get started:

### Prerequisites

- Docker
- Docker Compose

### Setup Steps

1. Clone the repository:
   ```
   git clone <repository-url>
   cd E-Abyana-Payment-Collection-System-
   ```

2. Build and start the Docker containers:
   ```
   docker-compose up -d
   ```

3. Install Composer dependencies:
   ```
   docker-compose exec app composer install
   ```

4. Generate application key (if not already set):
   ```
   docker-compose exec app php artisan key:generate
   ```

5. Run database migrations:
   ```
   docker-compose exec app php artisan migrate
   ```

6. Install NPM dependencies and build assets:
   ```
   docker-compose exec app npm install
   docker-compose exec app npm run build
   ```

7. Access the application:
   Open your browser and navigate to `http://localhost`

### Useful Commands

- View logs:
  ```
  docker-compose logs -f
  ```

- Access the PHP container:
  ```
  docker-compose exec app bash
  ```

- Access the MySQL container:
  ```
  docker-compose exec db bash
  ```

- Stop the containers:
  ```
  docker-compose down
  ```

## Development

The application code is mounted as a volume, so any changes you make to the code will be reflected immediately in the running application.

## Database

- Host: db
- Port: 3306
- Database: durshal_abyana
- Username: root
- Password: root

You can connect to the database using any MySQL client with these credentials.
