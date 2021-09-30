# Basic Ecommerce Backend

### A simple **ecommerce backend** with the basic functionalites with REST apis. Made with **Laravel 5.8**. Work For an assignment


## Setting Up the project:

**Step 1:** Download or clone the repository.

**Step 2:** Create a database and add a **.env** file modified as per your created database configuration.

**Step 3:** Update the composer to install necessary dependancies
> composer update

**Step 4:** Run migration to create the tables in your database
> php artisan migrate

**Step 5:** You can seed the products table with fake data if you want. (To seed successfully, you will need to link your public storage and create a folder named "image" inside that).
> php artisan db:seed


## APIs