
# Tasq

Task is a Laravel web app made for tracking teams of content writers. It currently uses Bootstrap 4 for UI. It's still in the very early stages of development - a MVP with a strong idea of what the app should do and how it should do it.

## Installation

Clone the repository

```bash
git clone https://github.com/knightspore/tasq.git
```

Generate a ```.env``` and enter your database credentials
```bash
cp .env.example .env
```

Basic Laravel Setup Commands
```bash
composer install
php artisan key:generate
php artisan migrate
```

Optional: Add your Slack Webhook to the .env file for Slack Integrations

## Usage

Users need to manually add Slack Tokens to their profiles under Profile > Edit profile. Notifications can be edited in app/notifications.

Start exploring Tasq by creating a few tasks with the create task button. You can then visit this task in the sheet. It will be highlighted in green to show that it hasn't yet been picked up. 

Click on the task name and assign it to yourself. Slack Notifications send to the user upon pickup, the user and editor when an editor adds themselves to the task, and to a selected Slack channel (See app/notifications) when a task is completed.

Completed tasks are marked as Priority 0 and moved to the archive sheet.

If you are over Level 5 (Profile > Edit profile) you will be able to Edit Task Details for each task. 

[Read more about how to use Tasq](https://ciaran.co.za/) or tweet me if you want to chat (@parabyl)


## To Do

    ☐  Add [Search Function](https://github.com/spatie/laravel-searchable)
    
    ☐ Add CSV Upload Functionality

    ☐ Zapier Integration - Post into Database from Zapier
      
    ☐ Create Client Accounts & View

## Contributing

Please get involved if you have any ideas and would like to get your hands a little dirty.
