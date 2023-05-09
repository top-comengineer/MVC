<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd13403434f8c139dc8af7461676d5106
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd13403434f8c139dc8af7461676d5106::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd13403434f8c139dc8af7461676d5106::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd13403434f8c139dc8af7461676d5106::$classMap;

        }, null, ClassLoader::class);
    }
}
