# MyQuiz

Quiz Project on PHP/Symfony.

## Description

Usual quiz.

You can:
 - View main page
 - Submit questions
 - Login
 - Sign Up

If you logged in as user, you also can:
 - Logout
 - Edit information about yourself
 - Play quizes


This project is being developed using [PHP 7.1](http://php.net/) and [Symfony 4.1](https://symfony.com/) and has only English version.

## Version

Alpha ( ͡° ͜ʖ ͡°).

## Installation

All you need is:
 - To install [PHP](http://php.net/) and [Composer](https://getcomposer.org/).
 - Via composer install all packages:

  `composer install`

 - Create database (if you want to change db setting edit it in config)

  `php bin/console doctrine:database:create`

  `php bin/console make:migration`

  `php bin/console doctrine:migrations:migrate`

 - Run PHP's built-in Web Server (or any other server)

 `php bin/console server:start`

 - Open in browser

###### For working contact form setup mailer

## Future

######  List of things that I want to implement in soon future:

- Add creating quiz.
- Add leaders.
- Add new comment features



## Documentation
- [Symfony](https://symfony.com/doc)
- [PHP](http://php.net/docs.php)


# Please be gentle
