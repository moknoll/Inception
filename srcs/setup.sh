mkdir -p secrets

# Generate secure random passwords (OpenSSL)
openssl rand -base64 18 > secrets/mysql_root_password.txt
openssl rand -base64 18 > secrets/mysql_password.txt
openssl rand -base64 18 > secrets/wp_db_password.txt

# Restrict access to secrets (owner only)
chmod 600 secrets/*.txt

# Generate WordPress admin password
openssl rand -base64 18 > secrets/wp_admin_password.txt

# Create .env and .env.example files if not present
cat > ./srcs/.env <<'EOF'
WORDPRESS_DB_HOST=mariadb
WORDPRESS_DB_USER=wp_user
WORDPRESS_DB_NAME=wordpress
MYSQL_DATABASE=wordpress
MYSQL_USER=wp_user
WP_URL=localhost
WP_TITLE=inception
WP_ADMIN_USER=admin
WP_ADMIN_PASSWORD_FILE=/run/secrets/wp_admin_password
WP_ADMIN_EMAIL=admin@inception.local
EOF

# Add secrets and .env to .gitignore
cat > .gitignore <<'EOF'
/secrets/
/.env
EOF