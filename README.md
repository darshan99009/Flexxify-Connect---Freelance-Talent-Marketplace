# Flexxify - Freelance Platform

![Flexxify Logo](logo.png)

A complete freelancing platform connecting businesses with skilled professionals, built with PHP and MySQL.

## Features

- **User Authentication**
  - Secure registration/login system
  - Password hashing
  - Session management

- **Job Marketplace**
  - Post new job listings
  - Search and filter jobs
  - Job application system

- **User Management**
  - Profile customization
  - Rating system
  - Complaint handling

## File Structure
**flexxify/
├── assets/*
│ ├── logo.png
│ ├── p1.png
│ ├── p2.png
│ ├── p3.jpg
│ └── p4.jpg
│
├── includes/
│ └── db_connection.php
│
├── public/
│ ├── index.php
│ ├── about.php
│ ├── complaint.php
│ ├── find-jobs.php
│ ├── login.php
│ ├── logout.php
│ ├── post-job.php
│ ├── signup.php
│ └── thank.html
│
├── style.css
├── database_schema.sql
└── README.md**


## Database Schema

Tables included:
- `user_info` - Stores user accounts
- `jobs` - Contains job listings
- `complaints` - Manages user complaints

## Requirements

- PHP 7.0+
- MySQL 5.7+
- Web server (Apache/Nginx)

## Setup

1. Import `database_schema.sql` to MySQL
2. Configure `includes/db_connection.php`
3. Deploy files to your web server

**Created by:**  
Darshan Gowda S (20221IST0055)  
Krishna Kumar Jha (20221IST0058)  
Students at Presidency University

**Project for Completion of the Subject : Frontend Full Stack Development **
**Institution:** Presidency University  
**Year:** 2024 
## License

MIT License
