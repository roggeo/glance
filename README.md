#Glance

###Manager themes for APPs in PHP

##Why to use?

[Leia-me em Português](README_pt_BR.md)


The idea is that with one manager themes, you are freer
to separate styles for your web application without worrying about change
in the URIs with in your template file. It needs to change only
configuration file "config.yml".

For get file of the style, to use only: "$theme->css("custom.css");";

[See examples](#examples)


##Status

[![Latest Stable Version](https://poser.pugx.org/roggeo/glance/v/stable)](https://packagist.org/packages/roggeo/glance) [![Total Downloads](https://poser.pugx.org/roggeo/glance/downloads)](https://packagist.org/packages/roggeo/glance) [![Latest Unstable Version](https://poser.pugx.org/roggeo/glance/v/unstable)](https://packagist.org/packages/roggeo/glance) [![License](https://poser.pugx.org/roggeo/glance/license)](https://packagist.org/packages/roggeo/glance)

##Install

Create a file composer.json with the following content:
    
```json 
{
    "require": {
        "php": ">=5.3.9",
        "symfony/yaml": "~2.1|~3.0",
        "symfony/filesystem": "~2.1|~3.0"
    },
    "require-dev": {
        "phpunit/phpunit": "~4.0"
    },
    "autoload": {
        "psr-4": {
            "Glance\\": "vendor/roggeo/glance/src"
        }

    }
}
```

Command Line:

    $ mkdir your_project
    $ chmod -R 777 your_project
    $ php -r "readfile('https://getcomposer.org/installer');" | php
    $ php composer.phar update


Or simply (if you have installed Composer):

    $ composer require roggeo/glance:dev-master


##Creating files of configurations

* public/config.yml

Main file to write names of themes and tags to project:

```yml
themes:
    "sometheme1":
    "sometheme2":
    "sometheme3": true
    "sometheme4":
``` 

* public/sometheme3/theme.yml

Information of a specific theme:

```yml
theme  : Litht
author : Geovani
email  : name@email.com
date   : 2015-11-08
license: http://opensource.org/licenses/MIT
link   : https://yoursite.com
description: >
    Theme default for Glance
```

The structure should be as follows:

[![Glance Explorer](docs/img/explorer.png)](#)


##Examples

[Theme](https://github.com/roggeo/light), how to create one.

[Demo](https://github.com/roggeo/demo-glance), how to use.


##Methods

```php

$theme = new Glance();

//images
$theme->img("name-image", "png");
$theme->img(array("image-1","image-2"), "png");
$theme->img("name-image.jpg");


//css
$theme->css("custon.css");
$theme->css(array("custon", "main"));
$theme->css(array("custon.css", "main"));
$theme->css();

//javascript
$theme->js("custon.js");
$theme->js(array("custon", "main"));
$theme->js(array("custon.js", "main"));
$theme->js();


//All
$theme->enqueue('image.png');


//Call files of another Theme
$theme->css('side','dark');
$theme->js('home', 'dark');
$theme->img('book','png','dark');
$theme->enqueue('img/book.png','dark');

```

##In your web page

Create a index.php at the root of your project with the following content:

```php
<?php
include "vendor/autoload.php";

use Glance\Glance,
    Glance\Config;

$conf = new Config();
$conf->setFolder('public/theme');
$theme = new Glance($conf);
?>

<html>
    <head>
        <title>Theme Light</title>
        <meta charset="UTF-8">
	<?php $theme->css();?>
    </head>
    <body>
        <div>Theme Light default Glance</div>
        <?=$theme->enqueue('img/light.jpg')?>
        <br />
        <?=$theme->img('light.jpg')?>
        <br />
        <?php
        foreach($theme->img(array("books1","books2"), "png") as $book):            
            echo "$book<br/>";            
        endforeach;        
        ?>
        <?=$theme->js('light')?>
    </body>
</html>

```

##Tests
For tests use PHPUnit after to use the recommendations above with Composer:

[More details PHPUnit](https://phpunit.de)

```bash
    $ cd you_project/vendor/roggeo/glance
    $ phpunit
```


##Contributing

If case of your interest, you can help improve this project.
See how:

- [Contribuing](CONTRIBUTING.md)


##License
- [License](LICENSE.md)