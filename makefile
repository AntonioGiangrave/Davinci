docker_down:
	docker-compose -f docker-compose.yml down --remove-orphans

docker_up:
	make docker_down
	docker-compose -f docker-compose.yml up

docker_up_detached:
	make docker_down
	docker-compose -f docker-compose.yml up -d

migrate-refresh:
	env DB_HOST=127.0.0.1 	php artisan migrate:refresh

test:
	clear
	./vendor/bin/phpunit
	php artisan dusk

start:
	php artisan config:clear
	npm run dev
	make docker_up_detached
