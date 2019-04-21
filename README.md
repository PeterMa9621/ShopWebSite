# SimpleWebSite (Version 0.1)
## Currently it is just a simple login register system

# Environment
### PHP
* Version: 5.6.30
### MySql
* Version: 5.7.17
* I am using PHPMyAdmin for now, but I will change to using MySql Workbench later

# Before to clone it
## Install EasyPHP - A very easy development environment (It includes both PHP and MySql)
* Go to website: https://www.easyphp.org/
* Choose a correct version and download Devserver (Devserver installs a complete, open source and ready-to-use development environment. Devserver is portable, modular, fully configurable and easy to update and extend)
* Please remember the directory that installed EasyPHP.
## After Installation
* Run Devserver.
* Go to http://127.0.0.1:1111/ to open the dash board of EasyPHP (make sure the port 1111 is available).
* Click start for both HTTP Server and Database Server. (make sure the port 80 and 3306 is available).
## initialize the database
* Go to http://127.0.0.1:1111/ to open the dash board of EasyPHP.
* Under MODULES, click the open button for PHPMyAdmin.
* In this page, you can simpliy click NEW to create a new database which named "Shop".
* After create the database, click it, then in the right hand, you can see a button named SQL, here, you can run SQL query.
* Install database script: Create table users (uid char(20) PRIMARY KEY, psw char(30), email text).
# Clone it
* Go to the directory that you installed EasyPHP, there is a folder named "eds-www". This folder is used to contain all your php websites.
* Go to the folder named "eds-www".
* Run command "git clone https://github.com/PeterMa9621/ShopWebSite.git".
* For now, all my content should be in the folder named "eds-www".
# Run the website
* Go to http://127.0.0.1/CodeIgniter/, you can see the home page.
