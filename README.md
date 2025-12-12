# Inception

This project is an introduction to Docker and Docker Compose. The goal is to create a multi-container application using `docker-compose`. The application consists of three services:

-   **Nginx**: A web server that serves the content of the WordPress site.
-   **WordPress**: A popular content management system (CMS).
-   **MariaDB**: A database for the WordPress site.

## Architecture

The services are linked together in a network. Nginx is the entry point and forwards requests to the WordPress service. WordPress connects to the MariaDB database to store and retrieve data.

-   **Nginx** listens on port 443 (HTTPS).
-   **WordPress** uses FastCGI to communicate with Nginx on port 9000.
-   **MariaDB** listens on port 3306 for database connections from WordPress.

## Volumes

Two volumes are used to persist data:

-   `wordpress_data`: Stores the WordPress files.
-   `mariadb_data`: Stores the MariaDB database files.

This ensures that the data is not lost when the containers are stopped or removed.

## Compilation & Setup

1.  **Prerequisites**: You need to have Docker and Docker Compose installed on your machine.

2.  **Environment Variables**: Create a `.env` file in the `srcs` directory with the following variables:

    ```
    MYSQL_USER=<your_database_user>
    MYSQL_PASSWORD=<your_database_password>
    MYSQL_DATABASE=<your_database_name>
    MYSQL_ROOT_PASSWORD=<your_database_root_password>
    ```

3.  **Build and Run**: Navigate to the `srcs` directory and run the following command:

    ```bash
    docker-compose up --build
    ```

    This will build the images for the services and start the containers.

## Accessing the Application

Once the containers are running, you can access the WordPress site by navigating to `https://localhost` in your web browser.

## Stopping the Application

To stop the application, run the following command in the `srcs` directory:

```bash
docker-compose down
```

This will stop and remove the containers, networks, and volumes.
