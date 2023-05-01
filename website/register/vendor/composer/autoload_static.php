<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc12c6b43f794987a850d4b07d87ffdcf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc12c6b43f794987a850d4b07d87ffdcf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc12c6b43f794987a850d4b07d87ffdcf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc12c6b43f794987a850d4b07d87ffdcf::$classMap;

        }, null, ClassLoader::class);
    }
}