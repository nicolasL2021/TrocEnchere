installations préalables:
    utilisation de composer autoload
        "altorouter/altorouter": "^1.2.0"-> router

        $router->map( 'GET', '/', 'render_home', 'home' );
            The map() method accepts the following parameters.

            $method (string)
            This is a pipe-delimited string of the accepted HTTP requests methods.

            Example: GET|POST|PATCH|PUT|DELETE

            $route (string)
            This is the route pattern to match against. This can be a plain string, one of the predefined regex filters or a custom regex. Custom regexes must start with @.
            Example using a controller#action string:
                UserController#showDetails
            // map users details page using controller#action string
                $router->map( 'GET', '/users/[i:id]/', 'UserController#showDetails' );

        "symfony/var-dumper": "^6.0" -> affichage des var-dump
        "filp/whoops": "^2.14" -> affichage des erreurs
        "fakerphp/faker": "^1.19" -> remplissage de la BDD
        "vlucas/valitron": "1.4.5" -> validation des formulaires