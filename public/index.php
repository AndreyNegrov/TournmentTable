<?php

use App\Kernel;

require_once dirname(__DIR__).'/config/autoload.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
