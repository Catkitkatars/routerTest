<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b1f57793b882be4caa27e013328b47c
{
    public static $files = array (
        '3d9967b9767ff17e1aeccb6869e5aef4' => __DIR__ . '/../..' . '/functions/ob_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b1f57793b882be4caa27e013328b47c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b1f57793b882be4caa27e013328b47c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4b1f57793b882be4caa27e013328b47c::$classMap;

        }, null, ClassLoader::class);
    }
}
