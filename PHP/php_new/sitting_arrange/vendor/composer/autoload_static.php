<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita10999d24806c0ceebf18f88bbad225c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Position\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Position\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita10999d24806c0ceebf18f88bbad225c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita10999d24806c0ceebf18f88bbad225c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
