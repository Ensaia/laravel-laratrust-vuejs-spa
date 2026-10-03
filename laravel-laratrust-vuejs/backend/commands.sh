
php artisan make:request ProductStoreRequest
php artisan make:controller Api/PersonController --resource --model=Person --requests --api -m

php artisan make:resource PersonResource
php artisan make:model Person -m
php artisan make:resource PersonResource

php artisan make:model Todo -mcr

rm public/storage
php artisan storage:link


php artisan make:request EmployeeDescriptionFormRequest


php artisan make:controller PostController --api


php artisan make:model Post -crR
