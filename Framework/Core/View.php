<?php

namespace Framework\Core;

class View
{
    public string $layout = 'site.php'; // default layout
    public string $template = 'product_list.php'; // default template

    public function render(string $template, $params = null, string $layout)
    {
        if (is_array($params)) {
            // converting array elements to variables
            extract($params);
        }

        include 'App/View/Layouts/' . $layout;
    }
}
