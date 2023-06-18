<?php declare(strict_types=1);

use KarchalAbdelfattah\Framework\Http\Kernel;
use KarchalAbdelfattah\Framework\Http\Request;
use KarchalAbdelfattah\Framework\Http\Response;

define('BASE_PATH', dirname(__DIR__));

require_once dirname(__DIR__).'/vendor/autoload.php';
//dd(123); // to check if the autoloader work correctly
// request received
$request = Request::createFromGlobals();
//dd($request);

// perform some logic
$kernel = new Kernel();

// send response (string of content)
//echo "Hello world";
//step 1
/* $content = "<h1> Hello world </h1>";

$response = new Response(content: $content, status: 200, headers: []); */

// Step 2
// call the kernel

$response = $kernel->handle($request);

$response->send();