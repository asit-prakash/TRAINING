<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'user\\' => array($baseDir . '/model/login'),
    'dbcon\\' => array($baseDir . '/model/db_conn'),
    'blog\\' => array($baseDir . '/model/blogs'),
);
