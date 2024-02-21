## Preparing App
1. Generate TailwindCSS file<br><br>
    ```bash
    npm i -g tailwindcss
    npx tailwindcss -i ./static/css/input.css -o ./static/css/output.css
    ```
2. Configure project
    <br>Create **.env** file with content from **.env.example** file<br><br>
    ```dotenv
    # MariaDB database credentials
    DATABASE_HOST="localhost"
    DATABASE_PORT=3306
    DATABASE_USER="root"
    DATABASE_PASS="12345678"
    DATABASE_NAME="firma_kurierska"
    # Debug mode
    DEBUG=true
    ```
    <br>Import sql file (/static/schema.sql) to mysql server<br>

## Deploying
1. From PHP CLI:<br><br>
    ```bash
    php -S localhost:8080 or
    D:\Xampp\php\php.exe -S localhost:8080 
    ```
2. Apache configuration It's already handled by .htaccess file
3. Nginx configuration is available in nginx.conf file<br><br>
    ```nginx configuration
    server {
        index index.php;
    
        location / {
            try_files $uri @php_root;
        }
    
        location @php_root {
            fastcgi_pass unix:/run/php-fpm/php-fpm.sock; # or fastcgi_pass 127.0.0.1:9000;
            fastcgi_index index.php;
            include fastcgi_params;
    
            # Redirect everything to index.php
            fastcgi_param SCRIPT_FILENAME $document_root/index.php;
            fastcgi_param HTTPS off;
        }
    }
    ```
