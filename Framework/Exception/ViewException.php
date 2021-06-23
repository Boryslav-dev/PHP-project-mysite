<?php

namespace Framework\Exception;

class ViewException extends \Exception
{
    public $code = 404;
    public $message = 'Page not found';
}
