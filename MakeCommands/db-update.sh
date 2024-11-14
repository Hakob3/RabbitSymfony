docker compose exec php php bin/console doctrine:schema:update --dump-sql

docker compose exec php php bin/console doctrine:schema:update --force
