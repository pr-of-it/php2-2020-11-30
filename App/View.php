<?php

namespace App;

class View implements \Countable
{

    protected array $data = [];

    public function add($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    public function display($template)
    {
        include $template;
    }


    // Magic!

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function count()
    {
        return count($this->data);
    }

}
