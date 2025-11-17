# User Authentication System (PHP 8 + SQLite)

## Overview
This repository contains a lightweight, production-ready **user authentication system** built with PHP 8 and SQLite.  
The project demonstrates secure credential handling, modern PHP standards, clean architecture, and extensible components for managing user accounts.

The system includes:
- Secure registration  
- Password hashing  
- Safe login validation  
- Persistent storage via SQLite  
- A refactored architecture using a dedicated UserRepository  

This structure makes the project ideal for small applications, prototypes, internal tools, or foundational authentication modules.

---

## Features

- **Modern PHP 8 Codebase**
  - Strong typing  
  - Return types  
  - Exceptions for error handling  
  - Separation of concerns  

- **User Registration & Login**
  - Secure hashing using `password_hash()`  
  - Constant‑time password checks via `password_verify()`  
  - Input validation and error handling  

- **SQLite-Powered Persistence**
  - Lightweight, dependency-free database  
  - Automatic table creation  
  - Clean repository abstraction  

- **UserRepository Layer**
  - Encapsulates all database logic  
  - Improves testability  
  - Prevents SQL injection via prepared statements  

- **Minimal Bootstrap Script**
  - `index.php` acts as the entrypoint  
  - Orchestrates repository and auth service  

---

## Tech Stack

| Component | Technology |
|----------|------------|
| Language | PHP 8.x |
| Database | SQLite |
| Storage Layer | PDO |
| Architecture | OOP + Repository Pattern |

---

## Running the Project

### 1. Ensure PHP (with SQLite) is installed
Mac users:  
```bash
brew install php
```

Linux users:  
```bash
sudo apt install php php-sqlite3
```

Windows users:  
Use official PHP builds with `php_pdo_sqlite`.

### 2. Run the script
```bash
php index.php
```

The script will:
- Create the SQLite database (if missing)  
- Create the users table  
- Demonstrate registration and login operations  

---

## Project Structure

```
index.php              # Entrypoint: bootstraps the system
UserAuth.php           # Auth logic (registration + login)
UserRepository.php     # Data access abstraction layer
database.sqlite        # SQLite database (auto-created)
README.md
```

---

## Security Practices Implemented

- Password hashing  
- Prepared statements for all queries  
- Input validation  
- Protected database interactions  
- No plaintext credential storage  
- Clear exception handling  

This aligns the system with real-world secure application guidelines.

---

## Extensibility

This project is intentionally minimal but easy to expand:
- Add JWT tokens or sessions  
- Add user roles & permissions  
- Replace SQLite with MySQL/PostgreSQL  
- Add email verification  
- Add dependency injection container  
- Move classes into `src/` and use Composer autoloading  

---

## Summary

This repository contains a clean, secure, and modern PHP authentication backend using SQLite and OOP best practices.  
It can serve as a standalone user system or a foundation for more complex applications requiring authentication logic.
