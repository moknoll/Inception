# Inception
*This project has been created as part of the 42 curriculum by mknoll.*

## Description
This project is an introduction to Docker and Docker Compose. The goal is to create a multi-container application using `docker-compose`. The application consists of three services:

- **Nginx**: A web server that serves the content of the WordPress site.  
- **WordPress**: A popular content management system (CMS).  
- **MariaDB**: A database for the WordPress site.  

### Architecture
The services are linked together in a network. Nginx is the entry point and forwards requests to the WordPress service. WordPress connects to the MariaDB database to store and retrieve data.

- **Nginx** listens on port 443 (HTTPS).  
- **WordPress** uses FastCGI to communicate with Nginx on port 9000.  
- **MariaDB** listens on port 3306 for database connections from WordPress.  

### Volumes
Two volumes are used to persist data:

- `wordpress_data`: Stores the WordPress files.  
- `mariadb_data`: Stores the MariaDB database files.  

This ensures that data is not lost when the containers are stopped or removed.

---

## Virtual Machine vs Docker

### Virtual Machine
A Virtual Machine virtualizes an entire computer.

- Runs on top of a hypervisor (e.g., VirtualBox).  
- Each VM includes:
  - Its own kernel  
  - System libraries and applications  

Think of it as: **one physical machine → many full computers**  

### Docker (Containers)
Docker uses OS-level virtualization.

- Containers share the host OS kernel.  
- Each container includes:
  - Applications  
  - Required libraries and dependencies  

Think of it as: **one OS → many isolated processes**  

### Architecture Comparison
**Virtual Machine**

``` Hardware
└── Host OS
    └── Hypervisor
        └── Guest OS
            └── App
```
**Docker**
```Hardware
└── Host OS (Kernel)
    └── Docker Engine
        └── Container (App + libs)
```
### Performance and Resource Usage
Docker containers are far more efficient than virtual machines:

- VMs take several minutes to deploy since they start an entire guest OS.  
- Docker containers start within seconds as they share the host OS kernel.  
- VMs consume more RAM due to OS overhead, while Docker containers are lightweight.  

**Conclusion:** Docker containers are faster, more resource-efficient, and significantly lighter than VMs.

### Use Cases
- **Virtual Machines:** Running different OSes, strong isolation, secure environments.  
- **Docker:** Microservices, CI/CD pipelines, fast deployment and scaling.  

### When to use Docker:
- Microservices
- CI/CD Pipelines
- Fast Deployment & Scaling

**Conclusion**
- Docker Containers start in seconds and use fewer ressources because they share the host kernel.
- Virtual Machines take longer to start since they run a full Guest OS.
- VMs require more of ram and disk space than docker containers.
- Overall Docker containers are faster, more lightweight and more efficietn than Vms.

### .env Files
A `.env` file is a simple text file that holds environment variables in the format:
```
KEY=VALUE
```

Environment variables are used to pass configuration into Docker containers without hard-coding them into images. Docker Compose automatically injects these variables into containers.

**Example:**

  ```
  DB_USER=admin
  DB_PASSWORD=supersecret
  ```
**Pros:**
- Easy to use.  
- Works with Compose and `docker run`.  

**Cons:**
- Plain text — can leak if committed to Git.  
- Not secure for sensitive data — values can persist in image history.

### Docker Secrets
Docker Secrets provide a secure way to store sensitive data like passwords, encryption keys, and certificates.

- Secrets are encrypted at rest and in transit within Docker Swarm.  
- Only exposed to containers explicitly granted access.  
- Mounted as files inside the container:  

```
/run/secrets/<secret_name>
```

**Pros:**
- Secure — encrypted and scoped to services that need them.  
- Not visible via `docker inspect`.  
- Mounted in memory, not stored on disk inside the container.  

**Cons:**
- Only available in Docker Swarm mode.  
- Applications must read secrets from files, not environment variables.

### Key Security Differences
- `.env` files are plain text and visible in container environments.  
- Docker secrets are encrypted, scoped, and mounted in memory.

### When to Use Which
- Use `.env` for non-sensitive configuration (ports, non-secret settings).  
- Use Docker secrets for sensitive information (passwords, keys, tokens) in production or shared environments.

---

## Docker Network vs Host Network

### Docker Network
- Containers run in an isolated virtual network.  
- Each container gets its own IP address.  
- Ports must be explicitly published.  
- Containers communicate by container name.  
- Provides network isolation from the host.  

**Pros:** Secure and scalable.  
**Cons:** Slight networking overhead.

### Host Network
- Containers share the host network stack.  
- No separate container IP; no port mapping needed.  
- Containers use host IP and ports directly.  

**Pros:** High performance.  
**Cons:** No isolation; potential port conflicts.

### Key Differences
- Docker network → higher security, isolation, and port mapping required.  
- Host network → faster performance but no isolation.

### Recommended Usage
- Docker network → default choice, secure, scalable.  
- Host network → performance-critical apps or low-level networking tools.

---

## Docker Volumes vs Bind Mounts

### Docker Volumes
- Managed by Docker, stored in Docker’s internal directory.  
- Location on the host is abstracted.  
- Can be shared between containers.  
- Persist even if containers are removed.  

**Use case:** Databases, persistent storage, production.

### Bind Mounts
- Maps a specific host file or directory into the container.  
- Directly coupled to host filesystem.  
- Changes reflect immediately both ways.  

**Use case:** Local development, configuration files, live code editing.

### Key Differences
- Volumes → managed by Docker, portable, safe.  
- Bind mounts → host-dependent, less portable, full control over files.

### Inception Case
In this project, Docker volumes persist data under `/home/<login>/data`:

- MariaDB → `/home/<login>/data/mariadb`  
- WordPress → `/home/<login>/data/wordpress`  

This ensures important data remains intact even if containers are rebuilt.

---
## Instructions

1. **Prerequisites:** Make sure Docker and Docker Compose are installed.  
   You can follow the official guides:  
   - [Docker Installation](https://docs.docker.com/get-docker/)  
   - [Docker Compose Installation](https://docs.docker.com/compose/install/)

2. **Environment Variables:** Create a `.env` file in the `srcs` directory with the required variables (see the `srcs/.env.example` for reference).

3. **Build and Run:** Navigate to the `Inception` directory and run:

```bash
make up
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
- https://docs.docker.com/get-started/workshop/05_persisting_data/
