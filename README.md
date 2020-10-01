# Tasq

Task is a Laravel web app made for tracking teams of content writers. No one likes spreadsheets and it's nice to be able to see what everyone's doing, in one place, with ease.

Tasq uses Laravel Jetstream with Inertia. It's still in the very early stages of development - a MVP with a strong idea of what the app should do and how it should do it. The UI is designed using TailwindCSS.

I'm open to contributions! Please feel free to make a pull request for fixes, reommendations, new features, or ideas. 

## Installation

Clone the repository

```bash
git clone https://github.com/knightspore/tasq.git
cd tasq
```

Generate a ```.env``` and enter your database credentials (I use an SQLite DB created with ```touch database/database.sqlite```)
```bash
cp .env.example .env
```

Basic Laravel Setup Commands
```bash
composer install
php artisan key:generate
php artisan migrate
```

Setup NPM Dependencies
```bash
yarn && yarn dev
```

## Usage

If you want to generate some test data, I've set up 
```bash
php artisan db:seed
```

The general principle is as follows:
    - A task is created
    - A user assigns themselves to a task
    - Another user can then become the editor of a task
    - The task can now be marked complete
    - Finally, the task can be archived

## Roadmap

[Read more about how to use Tasq](https://ciaran.co.za/) or tweet me if you want to chat (@parabyl)
