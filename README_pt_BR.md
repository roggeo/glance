#Glance

###Gerenciador de temas para APPs em PHP

##Por que usar?

A ideia é que com o um gerenciador de temas, você tenha mais liberdade
para separar estilos para sua aplicação web sem se preocupar com alteração
no em URIs dentro do seu arquivo de template. Será necessário alterar apenas
do arquivo de configuração ```config.yml´´´.

Para chamar um arquivo de estilo use apenas: ```$theme->css("custon.css");´´´;

##Instalação

Crie uma arquivo com o nome composer.json:
    
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

Ou você pode usar comandos do composer:

    $ mkdir your_project
    $ chmod -R 777 your_project
    $ php -r "readfile('https://getcomposer.org/installer');" | php
    $ php composer.phar update



##Métodos que você pode usar:

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

##Na sua página web:

Crie um arquivo index.php na raiz do seu projeto:

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
Use PHPUnit depois de seguir as recomendações acima com Composer:

[Mais detalhes PHPUnit](https://phpunit.de)

```bash
    $ cd you_project/vendor/roggeo/glance
    $ phpunit
```


##Contribuindo

- [Contribuing](CONTRIBUTING.md)


##Licensa
- [License](LICENSE.md)