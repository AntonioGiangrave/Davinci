# Davinci


### Project setup

```
docker-compose build
```

```
composer install
```

```
npm i
```

```
rename .env.example -> .env  and check
```


### Project start - All In One

```
make start
```

and go to http://127.0.0.1:8000

or  go to http://test.davinci.it:8000


### Project start - Single

```
docker-compose -f docker-compose.yml up
```

```
npm run dev
```

```
php artisan serve --host=test.davinci.it --port=8000
```

### Project test

```
make test
```