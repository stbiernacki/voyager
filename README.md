# Film Web Api

**This repository holds the code and script for demonstration purposes.**


## Setup

To get it working, follow these steps:

**Downloaded the code**

**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

**Configure the .env (or .env.local) File**

**Setup the Database**

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

**Setup the Assets**

```
yarn install
yarn encore dev
```

**Start the built-in web server**

You can use Nginx, Apache or Symfony's local web server.

To install the Symfony local web server, [see here](https://symfony.com/download).
You only need to do this once on your system.

Then, to start the web server, open a terminal, move into the
project, and run:

```
symfony serve
```

(If this is your first time using this command, you may see an
error that you need to run `symfony server:ca:install` first).

Now check out the site at `https://localhost:8000`


## Thanks!
