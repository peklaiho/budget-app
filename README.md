# Budget App

This is a minimal web app for managing your expenses. It uses [CakePHP](https://cakephp.org) web framework.

Currently the app does not have authentication because I run it on localhost for personal use. Obviously authentication needs to be added if the app is hosted on the public web.

## Installation

You need a standard LAMP stack (Apache, MySQL, PHP) or something similar.

Consult the [CakePHP manual](https://book.cakephp.org/4/) for general information about running a CakePHP app.

These are the rough steps to get the app running:

Install [Composer](https://getcomposer.org/), clone the repository, and then run `composer update`.

Create an empty database and database user for it.

Copy `config/app_local.example.php` to `config/app_local.php`. Set your database credentials and random string for security salt there.

Run database migrations and seeds:

```
$ bin/cake migrations migrate
...
$ bin/cake migrations seed
...
```

Manually edit the `start_money` fields in `accounts` table in the database to match how much money you currently have in each account. Of course you can add new accounts as needed.

Now the app is ready to be used.
