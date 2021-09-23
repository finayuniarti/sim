# Requirement

* PHP 7.3 with FPM

Instalation:
============================================================

    sudo apt install -y php7.3 php7.3-common php7.3-gd php7.3-intl php7.3-zip php7.3-sqlite3 php7.3-mysql php7.3-fpm php7.3-mbstring php7.3-xml php7.3-curl php7.3-memcached unzip zip composer

* Composer 1.x.x
* Node version 10.x

Instalation NODE:
============================================================

    curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -
	
    apt install nodejs

* NPM
* NGINX

Instalation NGINX:
============================================================
	
    apt install nginx
    
NGINX Conf.:
============================================================
	
    server {
    listen 80;
    listen [::]:80 ipv6only=on;
    server_name _;
    root /var/www/html/sim/;
    index index.html index.htm index.php;

    charset utf-8;
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/simp-error.log error;

    error_page 404 /index.php;

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        fastcgi_pass unix:/run/php/php7.3-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }}


* MySQL


Instalation SIMP:
============================================================

    git clone https://github.com/finayuniarti/sim.git
    
    cd simp/
	
    composer install 

    php artisan migrate


Pusher Requirement
=============================================================

    composer require pusher/pusher-php-server

    npm install laravel-echo
    
    npm install --save-dev laravel-echo pusher-js

    npm run dev
    
 .env:
============================================================

    PUSHER_APP_ID=your-pusher-app-id
    PUSHER_APP_KEY=your-pusher-key
    PUSHER_APP_SECRET=your-pusher-secret
    PUSHER_APP_CLUSTER=mt1

