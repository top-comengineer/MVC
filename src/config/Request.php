<?php

namespace app\config;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        $query = strpos($path, '?');

        if (!$query)
        {
            return $path;
        }

        return substr($path, 0, $query);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if ($this->getMethod() === 'post')
        {
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }

        if ($this->getMethod() === 'get')
        {
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }
    }
}