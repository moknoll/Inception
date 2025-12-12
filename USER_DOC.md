Understand what services are provided by the stack.
◦ Start and stop the project.
◦ Access the website and the administration panel.
◦ Locate and manage credentials.
◦ Check that the services are running correctly.

### Use this script to get started 
```bash
mkdir -p secrets

# sichere, zufällige Passwörter erzeugen (OpenSSL)
openssl rand -base64 18 > secrets/mysql_root_password.txt
openssl rand -base64 18 > secrets/mysql_password.txt
openssl rand -base64 18 > secrets/wp_db_password.txt

# setze restriktive Rechte (nur Owner lesen)
chmod 600 secrets/*.txt

# erstelle .env und .env.example (falls noch nicht vorhanden)
cat > .env <<'EOF'
WORDPRESS_DB_HOST=mariadb
WORDPRESS_DB_USER=wp_user
WORDPRESS_DB_NAME=wordpress
MYSQL_DATABASE=wordpress
MYSQL_USER=wp_user
EOF

cat > .env.example <<'EOF'
WORDPRESS_DB_HOST=
WORDPRESS_DB_USER=
WORDPRESS_DB_NAME=
MYSQL_DATABASE=
MYSQL_USER=
EOF

# .gitignore
cat > .gitignore <<'EOF'
/secrets/
/.env
EOF
```
