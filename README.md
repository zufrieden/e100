E100
----

A Symfony2 project.

How to install
==============


```bash
    
    $ cp app/config/parameters.yml.dist app/config/parameters.yml
    $ edit app/config/parameters.yml
    $ php composer.phar install
    $ php app/console assets:install --symlink web
    $ php app/console assetic:dump -e prod --no-debug
    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:create
    $ php app/console doctrine:fixtures:load
```

After a pull
=============

```bash
    $ php app/console doctrine:migrations:migrate
```
