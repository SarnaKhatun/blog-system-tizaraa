git clone https://github.com/SarnaKhatun/blog-system-tizaraa.git
cd blog-system-tizaraa
composer install/composer update
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
