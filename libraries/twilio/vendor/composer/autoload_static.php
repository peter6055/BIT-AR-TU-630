<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita777d98c71eaacff267f677309fe7cf5
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita777d98c71eaacff267f677309fe7cf5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita777d98c71eaacff267f677309fe7cf5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
