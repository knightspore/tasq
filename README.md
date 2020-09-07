# Tasq

Task is a Laravel web app made for tracking teams of content writers. It uses VueJS with Laravel in the Back-end for API. It's still in the very early stages of development - a MVP with a strong idea of what the app should do and how it should do it. The UI is designed using TailwindCSS.

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
npm install && npm run dev
```

If you want to generate some test data, I've set up fakers
```bash
php artisan db:seed
```

Optional: Add your Slack Webhook to the .env file for Slack Integrations

## Roadmap

[Read more about how to use Tasq](https://ciaran.co.za/) or tweet me if you want to chat (@parabyl)
