docker compose down --remove-orphans

docker stop $(docker ps -qa)

docker network prune -f
