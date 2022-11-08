# Tech Talent Assignment


> ### This project is User transaction.

----------

# Getting started

## Installation


Clone the repository

    git clone https://github.com/devaobeth/techtalent.git

Switch to the repo folder

    cd techtalent

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000


## Database seeding

**Populate the database with seed data with relationships which includes Users,Locations and Transactions. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the Seeder and set the property values as per your requirement

Run the database seeder and you're done

    php artisan db:seed


The api can be accessed at [http://localhost:8000/api](http://127.0.0.1:8000/api).

Api Documentation(Postman) https://documenter.getpostman.com/view/24277776/2s8YYMpMmu


