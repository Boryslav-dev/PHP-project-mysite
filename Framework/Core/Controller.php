<?php

namespace Framework\Core;

use kuchkov\TelegramMonolog\TelegramMonolog;
use Monolog\Logger;

class Controller
{
    public View $view;
    public Model $model;
    public Logger $log;

    public function __construct()
    {
        $this->log = new Logger('TelegramMonolog');
        $this
            ->log
            ->pushHandler(
                new TelegramMonolog(
                    '1821237183:AAE1Fpq0_c4V7jd-gLvhEEEq-AK5H-f9yjs',
                    '-414227601',
                    'UTC',
                    'F j, Y, g:i a',
                    60
                )
            );
        $this->view = new View();
        $this->model = new Model();
    }
}
