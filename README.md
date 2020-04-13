# Esercitazione Davinci


### Project setup


```
composer install
```

```
npm i
```

```
rename .env.example -> .env  and check
```


### Project start - AllInOne

```
make serve
```

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