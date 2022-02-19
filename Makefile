.DEFAULT_GOAL := install

install: ## Build the docker image used to run the sync
	docker build -t calculator -f Dockerfile .
	bin/composer install
