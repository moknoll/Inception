# User Documentation

This document explains, in clear and simple terms, how an end user or administrator can interact with the Inception project stack.

---

## 1. Services Provided by the Stack
The Inception stack consists of three main services:

- **Nginx**: Web server that serves the WordPress site.  
- **WordPress**: Content Management System (CMS) for managing website content.  
- **MariaDB**: Database service that stores WordPress data.

Nginx acts as the entry point and forwards requests to WordPress. WordPress communicates with MariaDB to store and retrieve data.

---

## 2. Starting the Project
To start the project:

1. Ensure Docker and Docker Compose are installed.  
   Official guides:  
   - [Docker Installation](https://docs.docker.com/get-docker/)  
   - [Docker Compose Installation](https://docs.docker.com/compose/install/)

2. Clone the Inception repository:
<<<<<<< HEAD

```bash
git clone https://github.com/<your_username>/Inception.git
cd Inception
```
3. Verify that Docker is running:
```bash
docker --version
docker compose version
```
4. Use the provided **setup script** to generate credentials and environment files.

The Script does the following: 
- Creates a secrets/ directory.
- Generates secure random passwords for MySQL and WordPress using OpenSSL'
- Restrict access to secrets (chmod 600)
- Creates .env if they dont exist.
- Adds .env and secrets/ to .gitignore

To Create the **setup script**:
```bash
touch setup.sh
chmod +x setup.sh
```
Then copy the following content into setup.sh

```bash
git clone https://github.com/<your_username>/Inception.git
cd Inception
```
3. Verify that Docker is running:
```bash
docker --version
docker compose version
```
4. Use the provided **setup script** to generate credentials and environment files.

The Script does the following: 
- Creates a secrets/ directory.
- Generates secure random passwords for MySQL and WordPress using OpenSSL'
- Restrict access to secrets (chmod 600)
- Creates .env if they dont exist.
- Adds .env and secrets/ to .gitignore

To Create the **setup script**:
```bash
touch setup.sh
chmod +x setup.sh
```
Then copy the following content into setup.sh

```bash
#!/bin/bash

# Create data directories on host (as required by project)
mkdir -p /home/$USER/data/mariadb
mkdir -p /home/$USER/data/wordpress

# Create secrets directory in main project folder
mkdir -p ./secrets

# Generate secure random passwords (OpenSSL)
openssl rand -base64 18 > ./secrets/mysql_root_password.txt
openssl rand -base64 18 > ./secrets/mysql_password.txt
cp ./secrets/mysql_password.txt ./secrets/wp_db_password.txt
openssl rand -base64 18 > ./secrets/wp_admin_password.txt

# Restrict access to secrets (owner only)
chmod 600 ./secrets/*.txt

# Create .env file in srcs directory
cat > ./srcs/.env <<'EOF'
WORDPRESS_DB_HOST=mariadb
WORDPRESS_DB_USER=wp_user
WORDPRESS_DB_NAME=wordpress
MYSQL_DATABASE=wordpress
MYSQL_USER=wp_user
WP_ADMIN_USER=admin
WP_ADMIN_EMAIL=admin@inception.local
EOF

# Add secrets and .env to .gitignore (in main project folder)
cat > ../.gitignore <<'EOF'
/secrets/
/srcs/.env
.DS_Store
*/.DS_Store
/srcs/web/
EOF
```
5. Run the setup script with following command 
```bash
./srcs/setup.sh
```
6. Navigate to the Inception directory and run
```
make up
```
This Builds the images and starts all containers. 

## 3. Stopping the Project
To stop the stack, run: 
```
make down
```
This stops and removes containers, networks and volumes. 

## 4. Accesing thr Website and Administration Panel
- **Website**:Open your browser and navigate to:
```
https://yourlogin.42.fr
```
- **WordPress Admin Panel**: Go to:
```
https://yourlogin.42.fr/wp-admin
```
## 5. Locating and Managing Credentials
- The setup scritp secutes credentials stored in the /secrets directory:
```bash
secrets/mysql_root_password.txt
secrets/mysql_password.txt
secrets/wp_db_password.txt
```
- Environment variables for database access are stored in .env.
- Sensitive data is restricted to owner-only access (chmod 600).
- .env and /secrets are ignonres by Git via .gitignore

## 6. Checking Service Status
To Verify the services are running correctly: 
1. List running Docker Containers:
```bash
docker ps
```
Expected Container 
- nginx
- wordpress
- mariadb
   
2.Check logs for each service if needed
```bash
docker logs <container_name>
```
3. Access website to confirm WordPress loads correctly.
```
https://yourlogin.42.fr
```
## Notes
- Make sure ports 433(HTTPS) and 3306(MariaDB) are available on your host.
- Docker Voulmes (wordpress_data and mariadb_data) ensure persistent data even if containers are rebuilt.
