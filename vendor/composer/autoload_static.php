<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef49a8fdb53ac38108d2919b1520d46a
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef49a8fdb53ac38108d2919b1520d46a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef49a8fdb53ac38108d2919b1520d46a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
