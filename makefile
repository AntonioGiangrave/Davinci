# ------------ DOCKER ACTIONS ------------

docker_down:
	docker-compose -f docker-compose.yml down --remove-orphans

docker_up:
	make docker_down
	docker-compose -f docker-compose.yml up

docker_up_detached:
	make docker_down
	docker-compose -f docker-compose.yml up -d

# ------------ DOCKER ACTIONS ------------


# ------------ TEST ------------
test-phpunit:
	./vendor/bin/phpunit

test-dusk:
	env DB_HOST=127.0.0.1 php artisan dusk 

test:
	make test-phpunit
	make test-dusk
# ------------ TEST ------------



migrate-refresh:
	env DB_HOST=127.0.0.1 php artisan migrate:refresh


start:
	php artisan config:clear
	npm run dev
	make docker_up_detached
