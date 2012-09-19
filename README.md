# E100 CHallenge


# Installation

## Configure Apache vhost `e100.dev`

```
    <VirtualHost *:80>
        ServerName e100.dev
        DocumentRoot "/path/to/projet"
        DirectoryIndex index.php
        <Directory "/path/to/projet">
            AllowOverride All
            Allow from all
        </Directory>
    </VirtualHost>
```

## Install vendors

```bash
    $ php composer.phar install
```

# Update project

Sometimes, after a pull, you need to update the project dependency:

    $ php composer.phar install

# Tests

To run the test suite, you need [composer](http://getcomposer.org) and [PHPUnit](https://github.com/sebastianbergmann/phpunit).

```bash
    $ php composer.phar install --dev
    $ phpunit
```

# Frontend

To generate new CSS files

```bash
    $ lessc assets/less/bootstrap.less assets/css/bootstrap.css
    $ lessc assets/less/responsive.less assets/css/responsive.css
```
