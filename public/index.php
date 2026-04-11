<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return static function (array $context) {
    $env = $context['APP_ENV'] ?? 'prod';
    $debug = (bool) ($context['APP_DEBUG'] ?? false);

    if ('dev' === $env && !class_exists('Symfony\\Bundle\\DebugBundle\\DebugBundle')) {
        $env = 'prod';
        $debug = false;
    }

    return new Kernel($env, $debug);
};
