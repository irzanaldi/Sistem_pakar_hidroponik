git clone https://github.com/irzanaldi/Sistem_pakar_hidroponik.git
copy .env.example ke .env nya ( .env nya bikin baru )
composer install ( kalo make vscode tekan tombol ctrl + ` buat buka terminalnya terus ketik itu `)
php artisan migrate --seed
php artisan db:seed --clas=TanamanSeeder
php artisan db:seed --clas=BagianTanamanSeeder
