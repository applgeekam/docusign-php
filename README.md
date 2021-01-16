# About this package

It is an application that implements the DocuSign API to sign a document.

## Installation

Use the package manager [Composer](https://getcomposer.org/download/) to install dependencies.

```bash
composer install
```

## Configuration

First, run script.txt in your sql console to create a db and tables used by this application.

Copy ds_config_exemple.php in ds_config.php and change the configuration variables of DocuSign.
You can download a Quicstart to use his ds_config file already configured.

Add after $JWT_CONFIG, this to ds_config file :

```php
$BD_CONFIG = [
    'host' => '<your db server host>',
    'dbname' => '<your db name>',
    "username" => '<your username>',
    "pwd" => "<your password>"
];
```

And, to the end of same file, add :

```php
$GLOBALS['BD_CONFIG'] = $BD_CONFIG;
```
## Usage

Open <root directory>/public directory in terminal and run :

```bash
php -S localhost:3333
```

Hope you enjoy !
