<?php
echo "error not found";

// ErrorDocument 404 http://www.site.com/Training/PHP/php_new/blog_site_mvc/test.php
// RewriteEngine On
// RewriteCond %{HTTP_HOST} ^http://www.site.com/Training/PHP/php_new/blog_site_mvc$
// RewriteRule ^$ http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php [L,R=301]

// <IfModule mod_rewrite.c>
//   RewriteEngine on
//   RewriteCond %{REQUEST_FILENAME} !-f
//   RewriteCond %{REQUEST_FILENAME} !-d
//   RewriteRule ^(.*)$ ./index.php?q=$1 [L,QSA]
// </IfModule>