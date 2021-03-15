<?php

namespace Vendor\Controller;

class Controller{

    /**
     * Display views with Database informations
     *
     * @param string $view
     * @param array $params
     */
    public function render($view, $params = []){
      $pathView = str_replace(".", "/", $view);
  
      ob_start();
      extract($params);
      require ROOT . '/App/view/' . $pathView . '.php';
      $content = ob_get_clean();
      require ROOT . '/App/view/' . $this->default . '.php';
    }
  
  }