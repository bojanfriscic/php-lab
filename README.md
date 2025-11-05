# 🐘 PHP Lab – Modern PHP Dev Environment with Docker


A fully containerized, zero-install local PHP lab with:
- PHP 8.3 (CLI + Apache)
- Composer (globally available)
- MySQL 8.0
- phpMyAdmin
- Environment config via `.env`
- Makefile DX shortcuts

Ideal for:
- Learning modern PHP (OOP, strict types, composer)
- Prototyping CLI or web apps
- Isolated development without polluting your system

## 🚀 Quick Start

### 1. Clone the repo

```bash
git clone git@github.com:yourname/php-lab.git
cd php-lab
```

### 2. Create your .env

```bash
cp .env.example .env
```

Set values that fit your local environment, for example:

```bash
# .env

# PHP container
APP_PORT=8082

# MySQL
DB_PORT=3307
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=lab
MYSQL_USER=user
MYSQL_PASSWORD=secret

# phpMyAdmin
PHPMYADMIN_PORT=8081
PHPMYADMIN_DEFAULT_DB=lab
```

### 3. Boot the stack

```bash
make up
```

## 📁 Folder Structure

```
php-lab/
├── docker/
│   ├── php/
│   │   └── Dockerfile
│   └── apache/
│       └── default.conf
├── src/               ← All your PHP code lives here
│   └── index.php
├── .env               ← Docker config (not committed)
├── .gitignore
├── Makefile
└── docker-compose.yml
```

## 📦 Docker Services

| Service      | Container Name  | Image                    | Description                          | Default URL / Port             |
|--------------|------------------|---------------------------|--------------------------------------|------------------------|
| `php`        | `php-lab`        | `php:8.3-apache`          | PHP 8.3 with Apache and Composer     | http://localhost:8082  |
| `db`         | `php-lab-db`     | `mysql:8.0`               | MySQL database for your PHP app      | Host: 127.0.0.1:3307   |
| `phpmyadmin` | `php-lab-pma`    | `phpmyadmin/phpmyadmin`   | GUI for managing MySQL database      | http://localhost:8081  |

## 🛠 Makefile Commands

| Command            | Description                                 |
|--------------------|---------------------------------------------|
| `make up`          | Start all containers (`docker compose up -d`) |
| `make down`        | Stop & remove containers (`docker compose down -v`) |
| `make bash`        | Open a shell in the PHP container (`docker exec -it php-lab bash`) |
| `make mysql`       | Open MySQL CLI in the DB container (`docker exec -it php-lab-db mysql -uuser -psecret lab`) |
| `make logs`        | Tail logs for all services (`docker compose logs -f`) |
| `make rebuild`     | Stop, remove volumes, rebuild and restart (`down -v && build --no-cache && up -d`) |
| `make composer-install` | Run `composer install` inside the PHP container |
| `make run`         | Run `php /var/www/html/index.php` inside the PHP container |

## 🧪 Tips

- PHP files live in src/
- Database is accessible via both MySQL CLI and phpMyAdmin
- Composer is available inside the container (make bash)
- Add libraries via:

```bash
make bash
composer require vendor/package
```
