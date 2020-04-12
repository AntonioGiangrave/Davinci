docker_down:
	docker-compose -f docker-compose.yml down --remove-orphans

docker_up:
	make docker_down
	docker-compose -f docker-compose.yml up

docker_up_detached:
	make docker_down
	docker-compose -f docker-compose.yml up -d

test:
	clear
	./vendor/bin/phpunit

serve:
	php artisan config:clear
	php artisan serve --host=test.davinci --port=8000