# Security Incident Reporting System

## Course
CP 222 – Open Source Technologies

## Degree Program
Cyber Security and Digital Forensics Engineering

## Group Number
Group 03

## Project Description
This project is a PHP-based Security Incident Reporting System developed as part of the Open Source Technologies course. The system enables authenticated users to register, log in, record security incidents, view incident reports, and search incidents by Incident ID. Git is used for version control and GitHub is used for collaborative development and project hosting.

## Installation Steps

### Required Dependencies

Before running this project, ensure the following software is installed on your Linux system:

- Apache Web Server
- PHP 8.x or later
- MariaDB Server
- Git
- A modern web browser (Firefox, Chrome, Edge, etc.)

### Installation Procedure

1. Clone the project from GitHub.

```bash
git clone https://github.com/YOUR_USERNAME/OpenSource_Assignment_CSDFE_Group03.git
```

2. Navigate to the project directory.

```bash
cd OpenSource_Assignment_CSDFE_Group03
```

3. Copy the project to Apache's web directory if necessary.

```bash
sudo cp -r OpenSource_Assignment_CSDFE_Group03 /var/www/html/
```

4. Start Apache and MariaDB services.

```bash
sudo systemctl start apache2
sudo systemctl start mariadb
```

5. Import the database.

```bash
mariadb -u root -p < database/incident_reporting_db.sql
```

6. Open your browser and access the project.

```
http://localhost/OpenSource_Assignment_CSDFE_Group03
```

## Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Server-side programming |
| HTML5 | Web page structure |
| CSS3 | User interface styling |
| MariaDB | Database management |
| Apache | Web server |
| Git | Version control |
| GitHub | Online repository hosting |
| Linux (Kali/Debian) | Development environment |


## Git Commands Used

The following Git commands were used during the development process:

```bash
git init
git status
git add .
git commit -m "Initial project structure"
git commit -m "Implemented user registration"
git commit -m "Implemented login module"
git commit -m "Added incident reporting module"
git commit -m "Added search functionality"
git checkout -b development
git merge development
git push -u origin main
```
## GitHub Repository Link

Project Repository:

https://github.com/jmy4200/OpenSource_Assignment_CSDFE_Group03

