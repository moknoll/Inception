# Creates base Image of container 
FROM debian:bookworm

# Install MariaDB server and delete pre-installed package list to compromise image -y automatically confirms installation
RUN apt update && apt install -y mariadb-server && \
    rm -rf /var/lib/apt/lists/*

# Copy custom configuration file and initialization SQL script into the container
COPY ./conf/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf
COPY ./tools/init.sql /etc/mysql/init.sql

# Copy script to initialize and start MariaDB
COPY ./tools/init-mdb.sh /init-mdb.sh
RUN chmod +x /init-mdb.sh

RUN mkdir /run/mysqld

#Expose Port 3306
EXPOSE 3306

# Default command to run MariaDB server in foreground
CMD [ "mysqld_safe" ]