<?php
namespace Core\Controller;

class Controller{

    public function encodeChars($data)
    {
        $encoded=[];

        foreach ($data as $key => $element) {
            if (is_array($element)) {
                foreach ($element as $key2 => $element2) {
                    if ($key == 'disease') {
                        $encoded['disease']=[];
                        array_push($encoded['disease'],htmlspecialchars($element2));
                    } elseif ($key == 'allergy') {
                        $encoded['allergy']=[];
                        array_push($encoded['allergy'],htmlspecialchars($element2));
                    }
                }
            } else {
                $encoded[$key] = htmlspecialchars($element);
            }

        }
        return $encoded;
    }

    public function render($view, $params = [])
    {
        $pathView = str_replace(".", "/", $view);
        ob_start();
        extract($params);
        require ROOT."App/Views/$pathView.php";
        $content = ob_get_clean();
        require ROOT."App/Views/default.php";
    }
}