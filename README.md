# Pucara's First Vulnerable Bank of Hackers

Pucara's First Vulnerable Bank of Hackers is a simple PHP application to illustrate a race condition vulnerability in a web application.

### Installation

You require a basic web server with PHP capabilities and a MYSQL database.

Install the dependencies and and start the server.

```sh
sudo apt-get update
sudo apt-get install apache2 mysql-server php libapache2-mod-php php-mcrypt php-mysql
```

Once this is done, copy the repository to /var/www/html/ and browse the web server.
The database will create by itself and fill with test information.