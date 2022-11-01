<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9db335143505b19e456c8e3795252d35
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Extendify\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Extendify\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9db335143505b19e456c8e3795252d35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9db335143505b19e456c8e3795252d35::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}