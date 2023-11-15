docker-compose down
docker-compose pull
docker-compose up -d
sleep 3
cp .env.example .env
sudo echo "127.0.0.1  photo.test" >> /etc/hosts
docker exec -it photo_verification-php-fpm composer install
docker exec -it photo_verification-php-fpm php yii migrate --interactive=0
echo 'http://photo.test:8084/site/index'