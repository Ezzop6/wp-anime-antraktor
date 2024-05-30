-include .env
export
build: .env
	@docker compose up --build --force-recreate -d

.env:
	@cp .env.dev .env

antraktor.env:
	@cp antraktor.env.dev antraktor.env

up:
	@docker compose up -d

stop:
	@docker compose stop

restart:
	@docker compose restart

logs-wp:
	@docker compose logs -f wordpress

logs-mysql:
	@docker compose logs -f mysql

clean:
	@docker compose down --rmi all --volumes --remove-orphans


# start local development
antraktor-build-dev: .env antraktor.env
	@rm -f wp-plugins/plugins/antraktor/.env
	@cp antraktor.env wp-plugins/antraktor/.env
	@grep -q 'BROWSERSYNC_PROXY' wp-plugins/antraktor/.env \
		|| echo "BROWSERSYNC_PROXY=localhost:${PORT_WORDPRESS}" >> wp-plugins/antraktor/.env
	cd wp-plugins/antraktor && npm install && npm run dev
