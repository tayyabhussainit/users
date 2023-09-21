
# Info

This app contains the User management systems. Features are listed below
- Login
- Signup
- Admin User can manage other users
- Create Roles
- Create Permissions
- Assign Roles
- Create Users
- Edit Users
- Delete Users
- User can change own profile

Authentication and Authorization has been applied with yii2 rbac

  
## Prerequisites

```

- PHP > 8.1

- Apache 2.4.52 with mod_rewrite module

- mysql >= 5.6

- Git

- Composer

- Curl

- MCrypt

- PDO PHP Extension

- Mbstring PHP Extension

- Tokenizer PHP Extension

```

## Installation and Setup

  

### 1- Clone

Clone this Repository

  

	git git@github.com:tayyabhussainit/users.git
  

### 2- Root dir

Go to root directory

    cd users

### 2- Database setup

Create database and configure credentials in 
users/environments/dev/common/config/main-local.php
  

        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=user_management',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],

### 3- Copy configuration files

    cp environments/dev/common/config/main-local.php common/config/main-local.php
    cp environments/dev/console/config/params-local.php common/config/params-local.php
    cp environments/dev/console/config/params-local.php console/config/params-local.php
    cp environments/dev/console/config/main-local.php console/config/main-local.php
    cp environments/dev/frontend/config/params-local.php frontend/config/params-local.php
    cp environments/dev/frontend/config/main-local.php frontend/config/main-local.php


### 4- Migration

Run artisan command for migration

	php yii migrate

### 5- Run commands
System Admin user will be created via console command

    php yii create-amin
Role, permissions will be create via console command

    php yii create-auth-items

### 6- Run application

For local setup, run below artisan comman

	php yii serve --docroot="frontend/web" --port 8080

This will serve the application at http://localhost:8080

### 7- Authentication

Login
    http://localhost:8080/site/login
Signup
    http://localhost:8080/site/signup

### 8- System admin

Login with System admin with

    username: sysadmin
    password: admin123
    
With System admin user, you will see a "User Management" menu.
From "User Management" menu you can manage users, roles, permissions.
NOTE : This option is only available for System Admin

### 9- Profile
Next to "User Management" there will another menu "Profile".
From "Profile" users can update their information. Only user can update his own information.
