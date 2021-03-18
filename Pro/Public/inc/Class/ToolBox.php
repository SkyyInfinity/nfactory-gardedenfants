<?php

namespace Public\inc\Class;

class ToolBox {

    /**
     * Debug une variable
     *
     * @param [type] $var
     * @return void
     */
    public function debug($var)
    {
        echo '<pre style="height:200px;overflow-y: scroll;font-size:.8em;padding: 10px; font-family: Consolas, Monospace; background-color: #000; color: #fff;">';
        print_r($var);
        echo '</pre>';
    }

    public function isLogged(): bool
    {
        $isLogged = true;
        if (empty($_SESSION['user']) || $_SESSION['user'] == '' ) {
            $isLogged = false;
            return $isLogged;
        } else {
            foreach ($_SESSION['user'] as $key => $value) {
            if (!isset($key) && !isset($value)) {
                $isLogged = false;
                return $isLogged;
            }
            }
        }
        return $isLogged;
    }

    public function showJson($data)
    {
        header("Content-type: application/json");
        $json = json_encode($data, JSON_PRETTY_PRINT);
        if($json){
            die($json);
        } else {
            die('error in json encoding');
        }
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}