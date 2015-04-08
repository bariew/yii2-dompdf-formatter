
Yii2 dompdf formatter
===================

See example below.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist bariew/yii2--dompdf-formatter "*"
```

or add

```
"bariew/yii2-dompdf-formatter": "*"
```

to the require section of your `composer.json` file.


Usage
-----

```
    Define app component in main config components section like in this example:
    'components' => [
    ...
        'formatters' => [
            'pdf' => [
                'class' => 'bariew\components\ResponseFormatter',
            ],
        ],
    ]

```