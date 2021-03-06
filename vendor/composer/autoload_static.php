<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e51a351cdf642cc5b1db317228abc79
{
    public static $files = array (
        'ee81868d246c318c7a37cc343ece37cc' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'APP\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'APP\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e51a351cdf642cc5b1db317228abc79::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e51a351cdf642cc5b1db317228abc79::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9e51a351cdf642cc5b1db317228abc79::$classMap;

        }, null, ClassLoader::class);
    }
}
