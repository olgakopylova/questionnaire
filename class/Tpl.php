<?php
class Tpl
{
    /**
     * Формирование страницы из шаблона
     * @param $tmp - Название шаблона
     * @param array $vars - Параметры для шаблона
     * @return false|string
     */
    public static function render($tmp, $vars = []) {
        if(file_exists('tpl/'.$tmp.'.tpl')) {
            ob_start();
            extract($vars);
            require 'tpl/'.$tmp.'.tpl';
            return ob_get_clean();
        }
    }

    /**
     * Формирование options
     * @param $params - Массив параметров для options
     * @return string
     */
    public static function generateOptions($params){
        $result="";
        foreach ($params as $key=>$param)
            $result.="<option>".$param['value']."</option>";
        return $result;
    }

}