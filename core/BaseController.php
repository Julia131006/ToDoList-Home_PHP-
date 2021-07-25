<?php

namespace core;


class BaseController{

    public $layot=true;

    public function render($view, array $params = []){

        $className = lcfirst(str_replace('Controller', '', substr(get_class($this), strpos(get_class($this), '\\') + 1 )));
        $viewPath = './views/' . $className . '/' . $view . '.php';
        
        if(file_exists($viewPath)){
            //var_dump($this->layot);
            if($this->layot){

                //echo $viewPath;
                require_once './views/shared/header.php';
            }
            extract($params);
            require_once $viewPath;
            if($this->layot){
                require_once './views/shared/footer.php';
            }
        } else {
            require_once './views/shared/error.php';
        }
        

    }
    public function redirect($path)
    {
        Header('Location: '. $path);
    }
    
}