# Waste Sorting
## Start2Impact PHP and MySQL project

" Tieni traccia dei giorni della settimana in cui avviene la raccolta differenziata. "
- Add, Update and Delete
- Controllo settimanale e giornaliero

## Project Setup:

### requirements

- PHP >= 7.3
- Node.js >= 12.x
- NPM >= 6.x
- Composer >= 2.1.5
- MySQL

### installation

- installare le dipendenze richieste da composer.json
    ```shell
    composer install
    ```
- installare le dipendenze richieste da package.json
    ```shell
    npm install
    ```
- creare una copia del file .env.example e rinominarlo **.env**
- Modificare il file .env con i propri settaggi MySQL
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=waste-sorting         //inserire nome database esistente
    DB_USERNAME=root
    DB_PASSWORD=
    ```
- Eseguire la migration per il database e il generate:key
    ```shell
    php artisan migrate
    php artisan key:generate
    ```
- PHP development server (localhost:8000)
    ```shell
    php artisan serve
    ```
  In caso di errore provare con:
  ```shell
  sudo php artisan serve
  ```
        
### End

Start2Impact PHP e MySQL by Pietro Tamburini
