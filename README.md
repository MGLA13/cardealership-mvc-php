<h1 align="center" id="title">Car dealership page</h1>

<div align="center">
    <img src="https://portfolio-migue-rasgado.netlify.app/build/img/car.webp" alt="project-image">
</div>

<p id="description">

   This project simulates the operation of a car dealership page, the page shows the cars and trucks for sale, a blog where you can see different articles, also a form to send messages if you want to sell or buy a car.

</p>


## Table of Contents

- [Demo](#demo)
- [Features](#features)
- [Getting Started](#getting-started)
  - [Database configuration](#database-configuration)
  - [Project packages](#project-packages)
  - [Local environment variables](#local-environment-variables)
  - [Use project](#use-project)
  - [Folders](#folders)
  - [Built with](#built-with)
- [Learn more](#learn-more)
- [License](#license)


## Demo

To see the demo of the page you can access the following link [Car dealership](https://tukciwi.sao.dom.my.id/)


## Features

Some of the project's features:

*   Car data is found in a MySQL database.
*   The project was made using The Model-View-Controller (MVC) pattern.
*   SASS language is used for the design and styles of the page.


## Getting Started

Clone and save the repository or download ZIP folder.

```bash
git clone git@github.com:MGLA13/cardealership-mvc-php.git
```

### Database configuration

Create a database in MySQL with the name: **cardealership**.

Import `sql/data.sql` into your MySQL management or access to mysql in your terminal and run every query.

The tables of the database are:

![](https://raw.githubusercontent.com/MGLA13/cardealership-mvc-php/main/imgs/tableCars.png)

Table cars for save the information of the cars.

![](https://raw.githubusercontent.com/MGLA13/cardealership-mvc-php/main/imgs/tableSellers.png)

Table sellers for save the information of the sellers that sell cars.

![](https://raw.githubusercontent.com/MGLA13/cardealership-mvc-php/main/imgs/tableUsers.png)

Table users for save the information of the admin user.


### Project packages

Open the project in a some code editor as VS Code.

Open a new terminal in the editor. 

Install NPM packages:

```bash
npm install
```

Install PHP packages:

```bash
composer install
```


### Local environment variables

create inside the folder `includes` a file named **.env** to set local environment variables:

![](https://raw.githubusercontent.com/MGLA13/cardealership-mvc-php/main/imgs/variables.png)


### Use project

To run the project, you need access to `public` folder. In the terminal run:

```bash
cd public 
```

Start a new php development server with:

```bash
php -S localhost:3000 
```

**Note:** The port number could be other, depend of you and your machine.

Open your browser and search **localhost:3000** to see the page.

You can login as admin user at **localhost:3000/login** and edit the information of the sellers and the cars, you can also add new cars to buy or new sellers. The login credentials are:

*   E-mail: correo@example.com
*   Password: 123456

You can go to **localhost:3000/contact** and send a message to a some email. To test this you need use an SMTP service like Gmail, Office365, Brevo, Mailtrap, AWS, etc and set your credentials in the local environment variables.


### Folders

*   `controllers` Contains all the controllers
*   `imgs` Contains used images in README.md
*   `includes` Contains helpers functions and composer autoload
*   `includes/config` Contains database connection configuration
*   `models` Contains all the models
*   `public` To run the project
*   `sql` Contains sql querys to create the database
*   `src/img` Contains images to optimize
*   `src/js` Contains JS files to handle events of the page
*   `src/scss` Contains SASS files to handle styles of the page
*   `views` Contains all the views
*   `gulpfile.js` Contains some Gulp tasks
*   `Router.php` To manage valid url´s


### Built with

Technologies used in the project:

*   Html5
*   JavaScript
*   Php 8.2.14
*   MySql 8.0.35
*   Sass 5.1
*   Gulp.js 4


## Learn More

* [MySQL](https://dev.mysql.com/downloads/) - Install Mysql documentation
* [PHP](https://www.php.net/manual/en/install.phpI) - Install PHP documentation
* [Sass language](https://sass-lang.com/) - SASS official page
* [MVC pattern](https://developer.mozilla.org/en-US/docs/Glossary/MVC) - MVC documentation
* [SMTP](https://aws.amazon.com/es/what-is/smtp/) - SMTP service explication


## License:

> This project is licensed under the MIT License.