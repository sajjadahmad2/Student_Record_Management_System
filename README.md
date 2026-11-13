# Student Record Management System

A PHP and MySQL administration application for maintaining student admission records and academic information.

## Features

- Admin account management
- Student record creation, editing, deletion, and search
- Course and section management
- Subject management
- Student result management
- Search by student ID and admission date range
- Session-based administrator access

## Technology

- PHP
- MySQL / MariaDB through MySQLi
- HTML, CSS, JavaScript, and bundled dashboard assets

## Local setup

1. Install PHP, MySQL/MariaDB, and a local web server such as Apache.
2. Create a database named `school`, which is the database name currently used in `dbconnection.php`.
3. Review the PHP files and prepare/import the database schema. A database dump is not currently included at the repository root.
4. If your local database uses different credentials, update `dbconnection.php` with local-only settings. Do not commit credentials.
5. Place the project in your web server document root and open it through the local server.
6. Verify the login, student, course, section, subject, and result workflows using a dedicated test database.

## Important security notice

The previous README published a demo username and password. Those credentials have been removed from this documentation; do not assume they are safe or valid. If they were ever used on a live system, change them immediately.

The current login implementation uses MD5 and builds a SQL query by concatenating submitted username/password values. This is not suitable for production. Replace it with prepared statements and PHP's `password_hash()` / `password_verify()` before exposing the application to users.

## License

No project-specific license has been confirmed. Review bundled template and asset licenses before redistribution.
