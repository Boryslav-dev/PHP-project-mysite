<?php

namespace Framework\Core;

class View
{
    public $layout = 'site.php'; // default layout
    public $template = 'product_list.php'; // default template

    function render(string $template, array $params = null, string $layout)
    {
        if (is_array($params)) {
            // converting array elements to variables
            extract($params);
        }

        include 'App/View/Layouts/' . $layout;
    }
}
