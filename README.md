# Flexxify-Connect---Freelance-Talent-Marketplace

![Flexxify Logo](images/logo.png.jpg)

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
# File Structure 
 ```
 flexxify/
├── assets/                  # All static assets
│   ├── logo.png             # Main application logo
│   ├── p1.png               # Carousel image 1
│   ├── p2.png               # Carousel image 2
│   ├── p3.jpg               # Carousel image 3
│   └── p4.jpg               # Carousel image 4
│
├── includes/                # Backend includes
│   └── db_connection.php    # Database configuration
│
├── public/                  # Main application files
│   ├── index.php            # Homepage
│   ├── about.php            # About page
│   ├── complaint.php        # Complaint system
│   ├── find-jobs.php        # Job search
│   ├── login.php            # Login page
│   ├── logout.php           # Logout handler
│   ├── post-job.php         # Job posting
│   ├── signup.php           # Registration
│   └── thank.html           # Confirmation page
│
├── style.css                # Main stylesheet
├── database_schema.sql      # Database structure
└── README.md                # Project documentation
```


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
Darshan TP (20221IST0056)
Students at Presidency University

**Project for Completion of the Subject :** Frontend Full Stack Development
**Institution:** Presidency University  
**Year:** 2024 
## License

MIT License
