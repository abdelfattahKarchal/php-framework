<?php

declare(strict_types=1);

use KarchalAbdelfattah\Framework\Http\Kernel;
use KarchalAbdelfattah\Framework\Http\Request;

define('BASE_PATH', dirname(__DIR__));

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request received
$request = Request::createFromGlobals();

// perform some logic
$kernel = new Kernel();

// call the kernel
$response = $kernel->handle($request);

$response->send();
