set TABLE=orders
php artisan make:view %TABLE%.show
php artisan make:view %TABLE%.index
php artisan make:view %TABLE%.create
php artisan make:view %TABLE%.update
php artisan make:view %TABLE%.delete
