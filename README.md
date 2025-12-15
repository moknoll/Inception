# Inception
*This project has been created as part of the 42 curriculum by mknoll.*

## Description 
This project is an introduction to Docker and Docker Compose. The goal is to create a multi-container application using `docker-compose`. The application consists of three services:

-   **Nginx**: A web server that serves the content of the WordPress site.
-   **WordPress**: A popular content management system (CMS).
-   **MariaDB**: A database for the WordPress site.

### Architecture

The services are linked together in a network. Nginx is the entry point and forwards requests to the WordPress service. WordPress connects to the MariaDB database to store and retrieve data.

-   **Nginx** listens on port 443 (HTTPS).
-   **WordPress** uses FastCGI to communicate with Nginx on port 9000.
-   **MariaDB** listens on port 3306 for database connections from WordPress.

### Volumes

Two volumes are used to persist data:

-   `wordpress_data`: Stores the WordPress files.
-   `mariadb_data`: Stores the MariaDB database files.

This ensures that the data is not lost when the containers are stopped or removed.

### Virtual Machine vs Docker
**Virtual Machine**
A Virtual Machine virtualizes an entire Computer
- Run on top of a Hypervisor e.g VirtualBox
- Each VM Includes:
  - Its Own Kernel
  - System Libraries + Applications
Think of it as: one physical machine -> Many full computers

**Docker (Containers)**
Docker Uses OS-level virtualization 
- Container shares the host OS kernel
- Each Container includes: 
  - Applications
  - Required Libraries & dependencies
Think of it as one OS -> many isolated processes

**Architecture Comparision**
Virtual Machine 
Hardware
└── Host OS
    └── Hypervisor
        └── Guest OS
            └── App

Docker (Container)
Hardware
└── Host OS (Kernel)
    └── Docker Engine
        └── Container (App + libs)
**Performance And Ressource Usage**Docker containers are far more efficient than virtual machines. <br> Virtual machines usually take several minutes to deploy because they have to start an entire guest operating system, including its own kernel. Docker containers, <br> on the other hand, start within seconds since they do not have their own kernel and instead share the host system’s kernel. <br> Virtual machines also consume a significant amount of RAM due to the overhead of running a full operating system, whereas Docker containers are much more lightweight and only include the application and its required dependencies. <br>In summary, Docker containers are faster, more resource-efficient, and significantly more lightweight than virtual machines.

**Use cases**
When to use a Virtual Machine: 
- Running Different operating systems
- Strong Isolation, Security environments
When to use Docker:
- Microservices
- CI/CD Pipelines
- Fast Deployment & Scaling

**Conclusion**
- Docker Containers start in seconds and use fewer ressources because they share the host kernel.
- Virtual Machines take longer to start since they run a full Guest OS.
- VMs require more of ram and disk space than docker containers.
- Overall Docker containers are faster, more lightweight and more efficietn than Vms.

**Secrets vs Environment Variables*What .env Files Are**
- A .env `file` is a simple text file that hold environment variables in `KEY=VAlue`
- Environment variables are the standard way to pass  configuration into Docker containers without hard coding in your image. 
- Docker Compose will read the .env file in the Compose directory and injects these variables into containers.
- Example:
  ```
  DB_USER=admin
  DB_PASSWORD=supersecret
  ```
Pros:
- Easy to use
- Works with compose and for docker run
 
Cons:
- Plain tect - can easily leak if accidentally commited to Git
- Not designed for sensitive data - values can persist in image history if used in ENV in a dockefile.
**What Docker Secrets Are**
- Docker Secretes are a built-in, secure way to store sensitive data like passwords, encryption keys, certificates etc.
- They are encrypted both at rest and in transit eithin Docker Swarm cluster() and only exposed to containers that you explicitly give permission to access.
- When a continer has a secret, DOcker mounts it as a file inside the conatiner under:
```
/run/secrets/<secret_name>
```
Pros: 
- More secure - encrypted and scoped only to services that need it
- NOt shown in docker inspect ouput like env variables can be
- Mounted in Memory not stored on disk inside the container
Cons:
- Only in Docker Swarm mode(services) - not for standalone containers by default
- Your app must read secrets from files (not environment variables)
### Key Security differences 
- .env is a plain text - anything can read the file or the container environmetn can see the values(docker inspect)
- Docker secrets are encrypted in storage and transit, and only available to services that neeed them, mounted in memory ad files reducing the risk of accidental leaks.
### When to Use Which
- Use .env foe non sernsitive configuration(port numbers, non-secret settings)
- USe Docker secrets for sensitive information (password keys tokens) in production or shared enivronments. 

### Docker Network vs Host Network 
**Docker Network**
When using a Docker Network (usually a Bridge Network), containers run in an Isolated virtual Network created by docker. 
- Each container gets its own IP Adress.
- Ports must explicitly published.
- Containers can communicate with each otherby Container name.
- Provides Network Isolation form the host.
Its More Secure, better fir multi Container Applications but wiht a slight Networking Overhead.

**Host Network**
When using host networking, the container shares the hosts network stack. 
- No seperate container ip
- No port mapping needed
- Containers uses the hosts IP and ports directly
- Very high Performance
Its the fastest networking but has no isolation and port conflicts can occure.

**Key Differences**
Docker network has an higher Security then Host Network as it has its Own Network Isolation, Ip adresses and Port Mapping is needed. <br>
Host Network is perofrmance wise faster then Docker Network. 

**When to Use which?**
- Docker Network -> default choice, dafer scalable, recommended
- Host Network -> prformace critical Apps or low level networking tools.

### Docker Volumes vs Bind Mounts 
**Docker Volumes**
Docker Volumes are managed by Docker itself and stored in Dockers internal directory ont the host. 
- Created and managed using Docker Commands
- Location on host is abstracted away
- Can be shared safely between containers
- Persist even if containers are removed
- Best choice for database data and persisten storage
Thy are Portable, safer and cleaner but with less direct Control over host path. 

**Bind Mounts**
Bind Mounts map a specific file or directory on the host directly into the container. 
- Uses an explicit host path (/home/<login>/data)
- Tightly coupled to the host filesystem
- Chenged refclet instantly both ways
- Commonly used for deployment.
It gives you full contol over host files, great for live code editing, but less portable and can accidently overwrite host data.

**Key Differences**
Docker volumes are managed by Docker, are highly Portable. as Bind Mounts have to be created by oneself and are not as portable. 

**Conclusion**
Docker volumes -> databases, production, backups 
Bind Mounts -> local development, config files, live reload
Volumes are Docker managed  and Protable, while bind mounts directly map host paths and are mainly used for development. 

**Inception Case**
In the Incception Project, Docker Volumes are used to persist MariaDB and Worpress data across container restarts, <br>
while bind mounts are used for configuration files like Nginx configs to allow easy modification without rebuilfing images. 
Persistent Data (DB, Wordpress files) -> Docker Volumes
Configuration Files -> bind Mounts. 

## Instrucuction 
1.  **Prerequisites**: You need to have Docker and Docker Compose installed on your machine.

2.  **Environment Variables**: Create a `.env` file in the `srcs` directory with the following variables:

    ```
    MYSQL_USER=<your_database_user>
    MYSQL_PASSWORD=<your_database_password>
    MYSQL_DATABASE=<your_database_name>
    MYSQL_ROOT_PASSWORD=<your_database_root_password>
    ```

3.  **Build and Run**: Navigate to the `Inception` directory and run the following command:

    ```bash
    make up
    ```

    This will build the images for the services and start the containers.

## Accessing the Application

Once the containers are running, you can access the WordPress site by navigating to `https://mknoll.42.fr` in your web browser.

## Stopping the Application

To stop the application, run the following command in the `Inception` directory:

```bash
make down
```

This will stop and remove the containers, networks, and volumes.

## Resources 
- https://docs.docker.com/build/building/best-practices/
- https://hub.docker.com/_/mariadb
- https://github.com/MariaDB/mariadb-docker/blob/master/docker-entrypoint.sh?utm_source=chatgpt.com
- https://github.com/docker/awesome-compose
- https://docs.nginx.com/tls
- https://www.cyberciti.biz/faq/configure-nginx-to-use-only-tls-1-2-and-1-3/
- https://hostim.dev/learn/foundations/env-vars-secrets/
