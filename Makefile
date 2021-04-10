default: help

.PHONY: help
help:
	@grep -E '^[0-9a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*??## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

# Local commands
.PHONY: dependencies
dependencies: ## Install the dependencies using composer
	composer install

.PHONY: tests
tests: ## Run the tests using local PHP
	./vendor/bin/phpunit

# Docker commands
.PHONY: docker-build
docker-build: ## Creates a PHP image with xdebug and install the dependencies
	docker build -t php-docker-bootstrap .
	@docker run --rm -v ${PWD}:/kata php-docker-bootstrap make dependencies

.PHONY: docker-tests
docker-tests: ## Run the tests using docker image generated with docker-build
	@docker run --rm -v ${PWD}:/kata php-docker-bootstrap make tests