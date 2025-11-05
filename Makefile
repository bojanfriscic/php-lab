up:
	docker compose up -d

down:
	docker compose down -v

bash:
	docker exec -it php-lab bash

mysql:
	docker exec -it php-lab-db mysql -uuser -psecret lab

logs:
	docker compose logs -f

rebuild:
	docker compose down -v && docker compose build --no-cache && docker compose up -d