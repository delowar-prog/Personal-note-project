 
## Project Name : Personal notes <br><br><br>  

### Step to run the project : 
- Download the project or clone<br>

- cd Personal-note-project<br>

- cp .env.example rename with .env

- open .env & update the DB_DATABASE (personal_notes_db) & create a new database into localhost->phpmyadmin

- Run:  composer install <br>
- Run:  php artisan key:generate
- Run: php artisan migrate:fresh
- Run: php artisan serve


