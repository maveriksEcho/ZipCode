##Init

cp .env.example .env

php artisan composer update

php artisan key:gererate

php artisan migrate

php artisan db:seed

php artisan l5-swagger:generate

When downloading a large file:

php.ini
post_max_size = 12M
upload_max_filesize = 12M

.env
CACHE_DRIVER=redis

php artisan queue:work   
