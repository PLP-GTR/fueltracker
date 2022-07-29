# Fueltracker

... by plp-gtr

## Installation:

- Optional: Add alias for sail to your `.zsh_aliases` or similar:
  - `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`
- Install docker
- Git checkout
- `cd src && composer install`
- `cp .env.example .env`
- `php artisan key:generate`

## Usage:

- `sail up` (or without alias `./vendor/bin/sail up`)
- visit http://0.0.0.0

# Notes

## My initial setup:

- Installed Laravel with `composer create-project laravel/laravel fueltracker/src`
- `cd fueltracker/src`
- Installed Sail 
  - with `composer require laravel/sail --dev` 
  - and `php artisan sail:install --devcontainer`
    - pgsql [1]
