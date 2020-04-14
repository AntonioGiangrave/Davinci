docker_down:
	docker-compose -f docker-compose.yml down --remove-orphans

docker_up:
	make docker_down
	docker-compose -f docker-compose.yml up

docker_up_detached:
	make docker_down
	docker-compose -f docker-compose.yml up -d

migrate-refresh:
	php artisan migrate:refresh

test:
	clear
	./vendor/bin/phpunit
	php artisan dusk

start:
	php artisan config:clear
	make docker_up_detached
	npm run dev

start:
	php artisan config:clear
	make docker_up_detached
	npm run dev
	php artisan serve --host=test.davinci.it --port=8000