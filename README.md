git clone https://github.com/SarnaKhatun/blog-system-tizaraa.git
cd blog-system-tizaraa
composer install/composer update
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
or create database blog_system_tizaraa
then import blog_system_tizaraa.sql from downloaded blog-system-tizaraa project
npm install && npm run dev
php artisan serve
