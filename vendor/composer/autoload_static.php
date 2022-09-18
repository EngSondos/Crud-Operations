<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc4de477606ca97e135d90001844f5e87
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc4de477606ca97e135d90001844f5e87::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc4de477606ca97e135d90001844f5e87::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc4de477606ca97e135d90001844f5e87::$classMap;

        }, null, ClassLoader::class);
    }
}