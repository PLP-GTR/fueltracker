# Fueltracker

... by plp-gtr

# Setup...

The application is based on [Laravel](https://laravel.com).

It is using [Laravel Sail](https://laravel.com/docs/sail) in development environment to provide easy access to PHP and a PostgreSQL database.

## ... installation

- Optional: Add alias for sail to your `.zsh_aliases` or similar:
  - `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`
- Install docker
- Git clone
- `cd src && composer install`
- `cp .env.example .env`
- `php artisan key:generate`

## ... usage

- `cd src`
- `sail up` (or without alias `./vendor/bin/sail up`)
- visit http://0.0.0.0

# Notes

## My initial setup:

- Installed Laravel with `composer create-project laravel/laravel fueltracker/src`
- `cd fueltracker/src`
- Installed Sail with `php artisan sail:install --devcontainer`
  - pgsql [1]
