php artisan make:middleware PermissionsPolicyMiddleware
php artisan config:cache
php artisan route:cache
chmod -R 777 storage
php artisan serve --host=192.168.1.7 --port=8080 



v-for="(animeList, index) in animeList" :key="index"
