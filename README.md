Validator for PHP
=======================

[![Latest Stable Version](https://poser.pugx.org/romeOz/rock-validate/v/stable.svg)](https://packagist.org/packages/romeOz/rock-validate)
[![Total Downloads](https://poser.pugx.org/romeOz/rock-validate/downloads.svg)](https://packagist.org/packages/romeOz/rock-validate)
[![Build Status](https://travis-ci.org/romeOz/rock-validate.svg?branch=master)](https://travis-ci.org/romeOz/rock-validate)
[![Coverage Status](https://coveralls.io/repos/romeOz/rock-validate/badge.svg?branch=master)](https://coveralls.io/r/romeOz/rock-validate?branch=master)
[![License](https://poser.pugx.org/romeOz/rock-validate/license.svg)](https://packagist.org/packages/romeOz/rock-validate)

[Rock validator on Packagist](https://packagist.org/packages/romeOz/rock-validate)

Features
-------------------

 * Supports large many validation rules (string, number, ctype, file, network)
 * Validation of scalar variable and array (`attributes()`)
 * **Output the list of errors in an associative array**
 * **i18n support**
 * **Hot replacement of placeholders for messages (`{{name}} must be valid`), as well messages**
 * **Customization of validation rules**
 * **Module for [Rock Framework](https://github.com/romeOz/rock)**

> Bolded features are different from [Respect/Validation](https://github.com/Respect/Validation).

Installation
-------------------

From the Command Line:

```composer require romeoz/rock-validate:*```

In your composer.json:

```json
{
    "require": {
        "romeoz/rock-validate": "*"
    }
}
```

Quick Start
-------------------

```php
use rock\validate\Validate;

// Validation length from 10 to 20 characters inclusive + regexp pattern
$v = Validate::length(10, 20, true)->regex('/^[a-z]+$/i');
$v->validate('O’Reilly'); // output: false

$v->getErrors();
/*
output:

[
  'length' => 'value must have a length between 10 and 20',
  'regex' => 'value contains invalid characters'
]
*/

$v->getFirstError();
// output: value must have a length between 10 and 20
```

####Replacement of placeholder

```php
use rock\validate\Validate;

$v = Validate::length(10, 20, true)
            ->regex('/^[a-z]+$/i')
            ->placeholders(['name' => 'username']);
$v->validate('O’Reilly'); // output: false

$v->getErrors();
/*
output:

[
  'length' => 'username must have a length between 10 and 20',
  'regex' => 'username contains invalid characters',
]
*/
```

####i18n

```php
use rock\validate\Validate;

$v = Validate::locale('ru')->length(10, 20, true)->regex('/^[a-z]+$/i');
$v->validate('O’Reilly'); // output: false

$v->getErrors();
/*
output:

[
  'length' => 'значение должно иметь длину в диапазоне от 10 до 20',
  'regex' => 'значение содержит неверные символы',
]
*/
```

####For Array or Object

```php
use rock\validate\Validate;

$input = [
    'username' => 'O’Reilly',
    'email' => 'o-reilly@site'
];
$attributes = [
  'username' => Validate::required()
      ->length(10, 20, true)
      ->regex('/^[a-z]+$/i')
      ->placeholders(['name' => 'username']),
  
  'email' => Validate::required()->email()
];

$v = Validate::attributes($attributes);
$v->validate($input); // output false

$v->getErrors();
/*
output:

[
  'username' => 
  [
    'length' => 'username must have a length between 10 and 20',
    'regex' => 'username contains invalid characters',
  ],
  'email' => 
      [
        'email' => 'email must be valid email',
      ]
]
*/

$attribute = 'email';
$v->getFirstError($attribute);
// output: email must be valid
```

Documentation
-------------------

 * [Rules](https://github.com/romeOz/rock-validate/blob/master/docs/rules.md)
 * [Custom messages, placeholders and templates](https://github.com/romeOz/rock-validate/blob/master/docs/custom-messages.md)
 * [Custom rules](https://github.com/romeOz/rock-validate/blob/master/docs/custom-rules.md)

Demo & Tests (one of two ways)
-------------------

####1. Docker + Ansible

 * [Install Docker](https://docs.docker.com/installation/) or [askubuntu](http://askubuntu.com/a/473720)
 * `docker run -d -p 8080:80 romeoz/vagrant-rock-validate`
 * Open demo [http://localhost:8080/](http://localhost:8080/)
 
####2. Vagrant + Ansible

 * `git clone https://github.com/romeOz/vagrant-rock-validate.git`
 * [Install VirtualBox](https://www.virtualbox.org/wiki/Downloads)
 * [Install Vagrant](https://www.vagrantup.com/downloads), and additional Vagrant plugins `vagrant plugin install vagrant-hostsupdater vagrant-vbguest vagrant-cachier`
 * `vagrant up`
 * Open demo [http://www.rock-validate/](http://www.rock-validate/) or [http://192.168.33.35/](http://192.168.33.35/)

> Work/editing the project can be done via ssh:

```bash
vagrant ssh
cd /var/www/rock-validate
```

Requirements
-------------------

 * **PHP 5.4+**

License
-------------------

The Rock Validator is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).