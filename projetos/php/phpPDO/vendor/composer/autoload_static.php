<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc824bf9b5f735ed0bf24b1b30184392c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Pdo\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Pdo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc824bf9b5f735ed0bf24b1b30184392c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc824bf9b5f735ed0bf24b1b30184392c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc824bf9b5f735ed0bf24b1b30184392c::$classMap;

        }, null, ClassLoader::class);
    }
}
