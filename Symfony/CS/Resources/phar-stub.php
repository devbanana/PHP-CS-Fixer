#!/usr/bin/env php
<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

if (defined('HHVM_VERSION_ID')) {
    if (HHVM_VERSION_ID < 30500) {
        fwrite(STDERR, "HHVM needs to be a minimum version of HHVM 3.5.0\n");
        exit(1);
    }
} elseif (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50306) {
    fwrite(STDERR, "PHP needs to be a minimum version of PHP 5.3.6\n");
    exit(1);
}

Phar::mapPhar('php-cs-fixer.phar');

require_once 'phar://php-cs-fixer.phar/vendor/autoload.php';

use Symfony\CS\Console\Application;

$application = new Application();
$application->run();

__HALT_COMPILER();
