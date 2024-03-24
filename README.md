

# Installation guide with docker

after you cloned project run the following command

copy .env file
```bash
cp .env.example .env
```

then run command to download sail
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
afther that run 
``` bash 
sail up -d # or ./vendor/bin/sail up in case you didn't added terminal alias
```
This will build up the container and start it
afther that run
``` bash
sail php artisan permissions:install
```
this will generate application key and build up database
<!-- if you run into errors because you tried some other commands run following command
```bash
sail up --build -d 
```
it will rebuild container -->
Next one is to install npm
```bash
sail npm install
```
And run it as development
```
sail npm run dev
```


And you are ready to run


# Without docker  
### Requirements PHP 8.3, composer 2.7.2 ,MySql ^8.0 or MariaDB ^10.0

```bash
cp .env.example .env
```
configure mysql and give corresponding username and password in .env file

Then run installation command

```bash
php artisan permissions:install
```
Next one is to install npm
```bash
npm install
```
And run it as development
```bash
npm run dev
```
