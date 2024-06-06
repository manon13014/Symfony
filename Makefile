# Makefile
SHELL := /bin/bash

tests:
	APP_ENV=test symfony console doctrine:database:drop --force || true
	APP_ENV=test symfony console doctrine:database:create
	APP_ENV=test symfony console doctrine:schema:update --force
	APP_ENV=test symfony console doctrine:fixtures:load -n
	APP_ENV=dev symfony php bin/phpunit

up:
	docker compose up -d
	symfony serve -d
	symfony run -d --watch=config,src,templates,vendor symfony console messenger:consume async

push:
	git add .
	git commit -m "$(m)"
	git push

phpstan:
	APP_ENV=dev symfony php vendor/bin/phpstan analyse --level max

php-cs-fixer:
	APP_ENV=dev symfony php vendor/bin/php-cs-fixer fix

php-cs-fixer-dry-run:
	APP_ENV=dev symfony php vendor/bin/php-cs-fixer fix --dry-run

quality:  php-cs-fixer tests phpstan

psql :
	 symfony run psql


.PHONY: tests