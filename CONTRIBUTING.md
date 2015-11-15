# Contributing to Glance

```shell
git clone git://github.com/roggeo/glance.git
cd Glance
```

Retrieve Glance's dependencies using [Composer](http://getcomposer.org/):

```shell
composer install
```

### Linux

You can test the project using the commands:
```shell
$ vendor/bin/phpunit
```

### Windows

You can test the project using the commands:
```shell
> vendor\bin\phpunit
```

No test should fail.

You can tweak the PHPUnit's settings by copying `phpunit.xml.dist` to `phpunit.xml`
and changing it according to your needs.

## Standards

We are trying to follow the [PHP-FIG](http://www.php-fig.org)'s standards, so
when you send us a pull request, be sure you are following them.

***

See also:

- [Home](README.md)
- [License](LICENSE.md)
