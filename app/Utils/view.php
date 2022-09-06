<?php

namespace App\Utils;


class View
{



    //método responsável por retornar um conteúdo de uma view
    private static function getContentView($view, $debug = false)
    {
        $file = __DIR__ . '/../../resources/views/' . $view . '.phtml';

        $err = '';
        if ($debug) {
            $err = 'Não possui essa página: ' . $file;
        } else {
            $err = 'Não possui essa página';
        }


        return file_exists($file) ? file_get_contents($file) : $err;
    }


    /**
     * 
     * This method render the view
     *
     * @access public
     * @param (string)$directory - file name
     * @param (array)$data -data pass in param
     * @return (?) html content
     * @version 1
     **/
    public static function render($view, $vars = [])
    {
        //self chama um método da classe atual que é estático caso não for usar o $this

        $contentView = self::getContentView($view);
        $keys = array_keys($vars);




        $keys = array_map(function ($item) {
            return '|| ' . $item . ' ||';
        }, $keys);
        return str_replace($keys, array_values($vars), $contentView);
    }
}
