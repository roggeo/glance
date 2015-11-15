Glance
===========
Manage your themes with Glance
------------------------------------

Install
-------

Create a file.json with the following content:
    
```json 
{
    "require": {
        "php": ">=5.3.9",
        "symfony/yaml": "~2.1|~3.0",
        "symfony/filesystem": "~2.1|~3.0"
    },
    "autoload": {
        "psr-4": {
            "Glance\\": "vendor/roggeo/glance/src"
        }

    }
}
```

You can use commands of the Composer:

    $ mkdir your_project
    $ chmod -R 777 your_project
    $ php -r "readfile('https://getcomposer.org/installer');" | php
    $ php composer.phar update



Methods
--------------------------

```php

$theme = new Glance();

//images
$theme->img("name-image", "png");
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

```

In your web page
-------------------------

Create a index.php at the root of your project with the following content:

```php
<?php

include "vendor/autoload.php";
use Glance\Glance;

$theme = new Glance();

?>
<!DOCTYPE html>
<!--
Theme default of Glance
-->
<html>
    <head>
        <title>Theme Light</title>
        <meta charset="UTF-8">
	<?php $theme->css();?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Theme Light default Glance</div>
    </body>
</html>

```

Contributing to Glance
----------------------

- [Contribuing](CONTRIBUTING.md)
- [License](LICENSE.md)