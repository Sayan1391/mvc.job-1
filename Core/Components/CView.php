<?php

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 16.09.2016
 * Time: 18:56
 */
class CView
{
    /**
     * @author Sayan
     * Рендерит представление
     */
    public function render($nameAction, $content = [])
    {
        $cont = __DIR__ . '/../../Views/' . $nameAction . '.php';

        if (!empty($content)) {
            foreach ($content as $key => $value) {
                $$key = $value;
            }
        }

        include $cont;
    }
    
}