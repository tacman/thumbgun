<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

//umask(0002); // This will let the permissions be 0775
umask(0000); // This will let the permissions be 0777
return fn(array $context) => new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
