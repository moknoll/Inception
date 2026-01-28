# User Documentation

This document explains, in clear and simple terms, how an end user or administrator can interact with the Inception project stack.

---

## 1. Services Provided by the Stack
The Inception stack consists of three main services:

- **Nginx**: Web server that serves the WordPress site (Entry Point, Port 443).
- **WordPress**: Content Management System (CMS) for managing website content (PHP-FPM).
- **MariaDB**: Database service that stores WordPress data.

Nginx acts as the secure entry point and forwards PHP requests to WordPress. WordPress communicates with MariaDB to store and retrieve data.

---

## 2. Prerequisites & Configuration

Before starting, map the project URL to your localhost.
Open your hosts file (on Linux/Mac: `/etc/hosts`) and add the following line:

```text
127.0.0.1 mknoll.42.fr
```

---

## 3. Starting the Project
To start the project:

1. Ensure Docker and Docker Compose are installed.  
   Official guides:  
   - [Docker Installation](https://docs.docker.com/get-docker/)  
   - [Docker Compose Installation](https://docs.docker.com/compose/install/)

2. Clone the Inception repository:

```bash
git clone https://github.com/moknoll/Inception.git
cd Inception
```
3. Verify that Docker is running:
```bash
docker --version
docker compose version
```
4. Use the provided **setup script** to generate credentials and environment files.

The setup script (`setup.sh`) does the following: 
- Creates a `secrets/` directory.
- Generates secure random passwords for MySQL and WordPress using OpenSSL.
- Restricts access to secrets (chmod 600).
- Creates `.env` if it doesn't exist.
- Adds `.env` and `secrets/` to `.gitignore`.

Run the **setup script**:
```bash
bash setup.sh
# or
chmod +x setup.sh && ./setup.sh
```

5. Build and start the containers:
   Navigate to the root directory (where the Makefile is) and run:
   ```bash
   make up
   ```
   This builds the Docker images and starts all containers in the background.

## 4. Stopping the Project

To stop the containers (data remains persistent):
```bash
make down
```

To stop and **remove all data** (clean slate):
```bash
make fclean
```

## 5. Accessing the Website and Administration Panel

- **Website**: Open your browser and navigate to:
  https://mknoll.42.fr

  *(Note: You might see a security warning because of the self-signed certificate. Accept it to proceed.)*

- **WordPress Admin Panel**:
  https://mknoll.42.fr/wp-admin

## 6. Locating and Managing Credentials

The setup script secures credentials and stores them in the `secrets/` directory:

- **Roots:** `secrets/mysql_root_password.txt`
- **Database:** `secrets/mysql_password.txt` & `secrets/wp_db_password.txt`
- **Admin:** `secrets/wp_admin_password.txt`

Environment variables are stored in `srcs/.env`.
*Note: These files are ignored by Git and protected via permissions (chmod 600).*

## 7. Checking Service Status

To verify the services are running correctly:

1. **List running containers:**
   ```bash
   docker ps
   ```
   You should see `nginx`, `wp-php` (or wordpress), and `mariadb` running.

2. **Check logs:**
   If something isn't working, check the logs of the specific service:
   ```bash
   docker logs nginx
   docker logs wp-php
   docker logs mariadb
   ```
