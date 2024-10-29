# Homeowner Management System

This project is a web application built using PHP 8.2 and Symfony. It aims to provide a user-friendly interface for managing homeowners and their details, including features like adding, editing, and viewing homeowner information.

## Requirements

- PHP 8.2
- Composer
- Symfony CLI

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/danishmujahid/street-group.git
Navigate to the Project Directory:

```bash
cd homeowner-management
```
Install Dependencies: Make sure you have Composer installed. If not, you can install it by following the instructions at getcomposer.org.

Once Composer is installed, run the following command to install the project dependencies:

```bash
composer install
```

Running the Application
To start the Symfony local server, use the following command:

```bash
php -S localhost:8000 -t public
```
You can then access the application in your browser at http://localhost:8000/parse-homeowners.

Running Tests
This project uses PHPUnit for testing. To run the tests, follow these steps:

Run the Test Suite: Use the following command to execute your test suite:

```bash
php bin/phpunit
```
Or, if you want to run a specific test file:

```bash
php bin/phpunit tests/YourTestFile.php
```


Additional Commands
Here are some additional Composer commands that may be useful:

Update Dependencies: To update your project dependencies to the latest versions as specified by your composer.json:

```bash
composer update
```

Run Code Style Checks (if using PHP CS Fixer):

```bash
composer fix
```

Clear Symfony Cache: If you need to clear the Symfony cache:

```bash
php bin/console cache:clear
```