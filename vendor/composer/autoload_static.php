<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd01b181176f86f0357dcf8a0ebae1a0c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Attributes\\Developer\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Attributes\\Developer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd01b181176f86f0357dcf8a0ebae1a0c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd01b181176f86f0357dcf8a0ebae1a0c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd01b181176f86f0357dcf8a0ebae1a0c::$classMap;

        }, null, ClassLoader::class);
    }
}
