# QuizBuddy

QuizBuddy is a web-based quiz management and assessment platform developed using PHP and MySQL. The system provides separate workflows for students and staff, allowing users to create, manage, attempt, and evaluate quizzes through a database-driven web application.

## Overview

QuizBuddy is designed around two primary user roles:

* **Students** can register, authenticate, browse available quizzes, attempt assessments, view scores, and access their profiles.
* **Staff** can authenticate, create and manage quizzes, add questions, view quiz-related information, and access performance data.

The application uses PHP for server-side processing and MySQL for persistent data storage, with HTML, CSS, JavaScript, and Bootstrap-based frontend components.

## Features

### Student Module

* Student registration and authentication
* Student login and logout
* Quiz listing and selection
* Online quiz attempt interface
* Automatic score calculation
* Scorecard generation
* Student leaderboard
* Student profile management
* Password update functionality
* Password reset workflow

### Staff Module

* Staff authentication
* Staff dashboard
* Quiz creation
* Question creation and management
* Quiz and question viewing
* Quiz deletion
* Staff profile management
* Performance and leaderboard access

### System Features

* Role-based application workflows
* MySQL-backed persistent data storage
* Database-driven quiz and question management
* Score calculation and result storage
* Leaderboard generation
* Email-based functionality using PHPMailer
* Reusable PHP header and footer components
* Responsive interface using Bootstrap-based styling

## Tech Stack

| Layer                   | Technologies                     |
| ----------------------- | -------------------------------- |
| Frontend                | HTML, CSS, JavaScript, Bootstrap |
| Backend                 | PHP                              |
| Database                | MySQL / MariaDB                  |
| Email                   | PHPMailer                        |
| Web Server              | Apache                           |
| Database Management     | phpMyAdmin                       |



## Project Structure

```text
QuizBuddy/
│
├── assets/
│   ├── css/
│   └── fonts/
│
├── img/
│
├── db/
│   ├── project.sql
│   └── quiz.sql
│
├── PHPMailer/
│
├── index.php
├── login.php
├── loginstud.php
├── signup.php
├── logout.php
│
├── homestud.php
├── homestaff.php
│
├── quizlist.php
├── takeq.php
├── viewq.php
├── addq.php
├── addqs.php
├── delete.php
│
├── studprofile.php
├── staffprofile.php
├── studscorecard.php
├── studleaderboard.php
├── staffleaderboard.php
│
├── reset.php
├── updatepw.php
├── contact.php
│
├── header.php
├── footer.php
├── style.css
└── sql.php
```



## Key Components

### Authentication

The application provides separate authentication flows for students and staff, with session-based access to their respective application areas.

### Quiz Management

Staff members can create quizzes and associate questions with individual quiz records. Questions and options are stored in MySQL and retrieved dynamically when a student attempts a quiz.

### Assessment and Scoring

During a quiz attempt, questions are retrieved from the database and presented to the student. Submitted responses are evaluated against the stored answers, and the resulting score is persisted for later access.

### Leaderboards

Quiz performance data is stored in the database and used to generate leaderboard views based on student scores.

### Email Integration

PHPMailer is included for email-related functionality such as password reset and communication workflows.


## Learning Outcomes

This project provided practical experience with:

* Server-side web application development using PHP
* Relational database design using MySQL
* CRUD operations
* User authentication and session management
* Form processing and server-side validation
* Database-driven dynamic content
* Quiz evaluation and score calculation
* Relational data modeling
* SQL queries and stored procedures
* Email integration using PHPMailer
* Structuring a multi-page web application

## Future Improvements

Potential improvements to the current implementation include:

* Migration to a modern PHP framework such as Laravel
* Improved password hashing and authentication security
* CSRF protection for state-changing requests
* Server-side input validation and sanitization
* Prepared statements throughout the application
* Improved database normalization
* REST API integration
* Modern frontend component architecture
* Improved responsive design
* Automated testing
* Containerized deployment using Docker
* Environment-based configuration for database and email credentials

## Project Status

This repository contains an earlier academic/learning implementation of QuizBuddy. It is preserved as a reference project demonstrating the development of a database-driven web application using PHP and MySQL.

.
