# UQ Library API - test implementation

Makes use of Laravel 5.1 framework

## Setup

### Composer

Make sure you have composer installed on your system. 

```
wget https://getcomposer.org/installer
chmod -v 0755 installer
php installer
sudo mv composer.phar /usr/local/bin/composer
```

After you have cloned this repository, please switch in to the folder and run the following:

```
composer install
```

Then, remove the following file:

```
rm -f vendor/compiled.php
```

Run,

```
composer update
```

### MySQL

Setup MySQL database. Make sure you set the credentials accordingly on your application specific 
environment file `.env`. Here is an example based on credentials available in `.env.example`

```
create database uql;

grant all privileges on uql.* to 'uql'@'localhost' identified by 'sha1-hash-or-whatever';

flush privileges
```

Setup Library table and seed with dummy data

```
php artisan migrate:refresh --seed
```

### Apache2
To do - add apache2 web configuration and setup and other information

## FAQ

If you run in to folder permissions error or 500 Internal Server Error, ensure your Web Server User has appropriate 
write permissions on `storage/` folder

```
sudo chmod -R 0777 storage/
```
If you run in to Laravel artisan command's failed to open `bootstrap/cache/services.json` error message, try creating 
the following cache directory under `bootstrap` folder.

```
mkdir bootstrap/cache
```

