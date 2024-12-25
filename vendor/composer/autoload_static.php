<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a67d4b8bd39ecf1fd86be3dffd50bab
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Birhanu\\Laradocs\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Birhanu\\Laradocs\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a67d4b8bd39ecf1fd86be3dffd50bab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a67d4b8bd39ecf1fd86be3dffd50bab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0a67d4b8bd39ecf1fd86be3dffd50bab::$classMap;

        }, null, ClassLoader::class);
    }
}