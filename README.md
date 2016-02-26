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
        "roggeo/glance": "dev-master"
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


##Starting the toy. See steps


* 1) Create one file **your-folder-themes/config.yml**:

```yml
# Name of the themes, if enabled tell true
themes:
    "sometheme1":
    "sometheme2":
    "sometheme3": true
    "sometheme4":
``` 


* 2) Create one file **your-folder-themes/your-theme/theme.yml**:

```yml
#Information of a specific theme
theme  : Litht
author : Geovani
email  : name@email.com
date   : 2015-11-08
license: http://opensource.org/licenses/MIT
link   : https://yoursite.com
description: >
    Theme default for Glance
```


* 3) Check your **Reposytory of themes**, should be as follows:

[![Glance Explorer](docs/img/explorer.png)](#)


* 4) Create one file **public/theme/index.php**, and insert code:

```php
require_once __DIR__.'/../../vendor/autoload.php';
use Glance\Response;
Response::listenMessage();
```


* 5) Create one file **public/theme/.htaccess**, and insert code:

```sh
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?get=$1 [L]
</IfModule>
```


##Examples

[Theme](https://github.com/roggeo/light), how to create one.

[Demo](https://github.com/roggeo/demo-glance), how to use.


##Methods

```php

use Glance\Glance,
    Glance\Config;

$conf = new Config();
$conf->setFolderTheme('C:\\themes');

$theme = new Glance($conf);

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

//New
$theme->assets('style.css','bootstrap');

```

##In your web page

Create a index.php at the root of your project with the following content:

```php
<?php
include "vendor/autoload.php";

use Glance\Glance,
    Glance\Config;

$conf = new Config();

// Defining folder repository of all yours themes
$conf->setFolderTheme('C:\\themes');

$theme = new Glance($conf);

$theme = new Glance($conf);
?>

<html>
    <head>
        <title>Theme Light</title>
        <meta charset="UTF-8">
	<?php $theme->css();?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Theme Light default Glance</div>
        <?=$theme->enqueue('img/light.jpg')?>
        <br />
        <br />
        <?=$theme->img('light.jpg')?>
        <br />
        Or
        <br />
        <?=$theme->img('light')?>
        <br />
        <br />
        <br />
        <?php
        foreach($theme->img(array("books1","books2"), "png") as $book):            
            echo "$book<br/>";            
        endforeach;        
        ?>
        <?=$theme->js('light')?>
        
        <div>
            <p>Other theme</p>
            <ul>
                <li><?=$theme->css('side','dark')?></li>
                <li><?=$theme->js('home')?></li>
                <li><?=$theme->img('book','png','dark')?></li>
                <li><?=$theme->enqueue('img/book.png','dark')?></li>
            </ul>
            <?php
            foreach ($theme->enqueue(array('img/book.png'), 'dark') as $book):
                echo "$book<br/>";
            endforeach;
            ?>
            
        </div>
        <div>
            <?php echo $theme->img('books1')?>
            <br/>
            <?php echo $theme->assets('style.css','bootstrap')?>
        </div>
        
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