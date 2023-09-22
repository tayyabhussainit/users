
# Info

This app contains the User management systems. Features are listed below
- [Home](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/home.png)
- [Login](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/login.png)
- [Signup](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/signup.png)
- Admin User can manage other users
- [Roles](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/admin_role_management.png)
- [Roles details](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/admin_role_assignment_2.png)
- [Permissions](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/admin_permissions.png)
- [Assignment]()
- [Create Users](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/admin_create_user.png)
- [Edit Users](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/admin_edit_user.png)
- Delete Users
- [Profile](https://raw.githubusercontent.com/tayyabhussainit/users/main/screens/profile.png)

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
environments/dev/common/config/main-local.php

        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=user_management',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ]

For Unit testing, create another database and configure credentials in
environments/dev/common/config/test-local.php

### 3- Copy configuration files

    cp environments/dev/common/config/main-local.php common/config/main-local.php
    cp environments/dev/console/config/params-local.php common/config/params-local.php
    cp environments/dev/console/config/params-local.php console/config/params-local.php
    cp environments/dev/console/config/main-local.php console/config/main-local.php
    cp environments/dev/frontend/config/params-local.php frontend/config/params-local.php
    cp environments/dev/frontend/config/main-local.php frontend/config/main-local.php
    cp environments/dev/common/config/test-local.php common/config/test-local.php
    cp environments/dev/common/config/test-local.php console/config/test-local.php
    cp environments/dev/common/config/codeception-local.php common/config/codeception-local.php
    cp environments/dev/common/config/codeception-local.php frontend/config/codeception-local.php
    cp environments/dev/common/config/codeception-local.php backend/config/codeception-local.php
    cp environments/dev/frontend/config/test-local.php frontend/config/test-local.php

### 4- Migration

Run command for migration

	php yii migrate

Run command for migration for unit testing DB
    
    yii_test migrate

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

### 10- Unit tests
Build the test suite

    ./vendor/bin/codecept build

Run test cases

    vendor/bin/codecept run -- -c common
    
