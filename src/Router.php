<?php
namespace App;

use AltoRouter;
use App\Security\ForbiddenException;

class Router{
    
    /**
     * viewPath
     *
     * @var string
     */
    private $viewPath;
    
    /**
     * router
     *
     * @var AltoRouter
     */
    private $router;
    
    /**
     * __construct
     *
     * @param  string $viewPath
     * @return void
     */
    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }
    
    /**
     * get
     *
     * @param  string $url
     * @param  string $view
     * @param  string $name
     * @return self
     */
    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);
        return $this;
    }

    public function match(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $view, $name);
        return $this;
    }
    
    public function url(string $name, array $params = []){
        return $this->router->generate($name, $params);
    }
    /**
     * run
     *
     * @return self
     */
    public function run(): self
    {
        $match = $this->router->match();
        if(!is_array($match)){
            $view = 'e404';
        }else{
            $view = $match['target'];
            $params = $match['params'];
        }
        // dd($view);
        $router = $this;
        $isAdmin = strpos($view, 'admin/') !== false;
        $layout = $isAdmin ? 'admin/layouts/default' : 'layouts/default';
        try {
            ob_start();
            require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
            $content = ob_get_clean();
            require $this->viewPath . DIRECTORY_SEPARATOR . $layout . '.php';
        } catch (ForbiddenException $e) {
            header('Location: ' .$this->url('login') . '?forbidden=1');
            exit();
        }

        return $this;
    }
}