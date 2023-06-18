<?php

namespace KarchalAbdelfattah\Framework\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel{
    public function handle(Request $request): Response
    {
        /* $content = "<h1>Hello world</h1>";

        return  new Response(content: $content);
        */
        // Create  a dispatcher
        $dispatcher = simpleDispatcher(function(RouteCollector $routeCollector){
            // STEP 1 
           /*  $routeCollector->addRoute('GET', '/', function(){

                $content = "<h1>Hello world</h1>";

                return  new Response(content: $content);
            });
            $routeCollector->addRoute('GET', '/posts/{id:\d+}', function($routeParams){

                $content = "<h1>this is post : {$routeParams['id']}</h1>";

                return  new Response(content: $content);
            }); */

            // STEP 2
            $routes = include BASE_PATH.'/routes/web.php';

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });

        //dd($request->getPathInfo());
       // dd($dispatcher);

        // Dispatch a URI, To obtain route info

        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()
        );

        //dd($routeInfo);
        //step 1
        //list($status, $handler, $vars) = $routeInfo;
        //return $handler($vars);
        
        // step2
        list($status, list($controller, $method), $vars) = $routeInfo;
        
        // Call the handler, provided by the route info, in order to create a Response
        // step 1
        //$response = (new $controller())->$method($vars);
        // step 2
        $response = call_user_func_array([new $controller, $method], $vars);
        return $response;
    }
}